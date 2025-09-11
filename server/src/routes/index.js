import { Router } from 'express';
import authRoutes from './auth.routes.js';
import crudRoutes from './crud.routes.js';

const router = Router();

router.use('/auth', authRoutes);
router.use('/v1', crudRoutes);

export default router;

