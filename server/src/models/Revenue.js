import mongoose from 'mongoose';

const revenueSchema = new mongoose.Schema(
  {
    appointment: { type: mongoose.Schema.Types.ObjectId, ref: 'Appointment', required: true },
    service: { type: mongoose.Schema.Types.ObjectId, ref: 'Service', required: true },
    date: { type: Date, required: true },
    amount: { type: Number, required: true, min: 0 },
  },
  { timestamps: true }
);

export const Revenue = mongoose.model('Revenue', revenueSchema);

