import mongoose from 'mongoose';

const userSchema = new mongoose.Schema(
  {
    name: { type: String, trim: true },
    email: { type: String, required: true, unique: true, lowercase: true, trim: true },
    passwordHash: { type: String, required: true },
    phone: { type: String, trim: true },
    address: { type: String, trim: true },
    role: { type: String, enum: ['patient', 'admin'], default: 'patient' },
  },
  { timestamps: true }
);

export const User = mongoose.model('User', userSchema);

