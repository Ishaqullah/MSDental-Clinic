import mongoose from 'mongoose';

const appointmentSchema = new mongoose.Schema(
  {
    timeSlot: { type: String, required: true },
    date: { type: Date, required: true },
    service: { type: mongoose.Schema.Types.ObjectId, ref: 'Service', required: true },
    patient: { type: mongoose.Schema.Types.ObjectId, ref: 'User' },
    doctor: { type: mongoose.Schema.Types.ObjectId, ref: 'Doctor' },
  },
  { timestamps: true }
);

export const Appointment = mongoose.model('Appointment', appointmentSchema);

