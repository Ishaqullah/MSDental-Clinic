import express from 'express';
import cors from 'cors';
import dotenv from 'dotenv';
import morgan from 'morgan';
import helmet from 'helmet';
import compression from 'compression';
import cookieParser from 'cookie-parser';
import { connectToDatabase } from './config/db.js';
import routes from './routes/index.js';

dotenv.config();

const app = express();

app.use(cors({ origin: '*', credentials: true }));
app.use(express.json({ limit: '1mb' }));
app.use(express.urlencoded({ extended: true }));
app.use(cookieParser());
app.use(morgan('dev'));
app.use(helmet());
app.use(compression());

app.get('/health', (req, res) => {
  res.json({ status: 'ok' });
});

app.use('/api', routes);

// health under /api to support client checks
app.get('/api/health', (req, res) => {
  res.json({ status: 'ok' });
});

const PORT = process.env.PORT || 4000;

function startServer() {
  // Connect to DB asynchronously so server can start regardless
  connectToDatabase().catch((error) => {
    console.error('Database connection failed:', error.message);
  });

  app.listen(PORT, () => {
    console.log(`API listening on :${PORT}`);
  });
}

startServer();
