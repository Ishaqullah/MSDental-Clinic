import mongoose from 'mongoose';

const serviceSchema = new mongoose.Schema(
  {
    name: { type: String, required: true, trim: true },
    fees: { type: Number, required: true, min: 0 },
  },
  { timestamps: true }
);

export const Service = mongoose.model('Service', serviceSchema);

