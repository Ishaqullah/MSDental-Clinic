import mongoose from 'mongoose';

const patientRecordSchema = new mongoose.Schema(
  {
    registration: { type: mongoose.Schema.Types.ObjectId, ref: 'User', required: true },
    doctor: { type: mongoose.Schema.Types.ObjectId, ref: 'Doctor', required: true },
    appointment: { type: mongoose.Schema.Types.ObjectId, ref: 'Appointment', required: true },
    problem: { type: String, required: true, trim: true },
  },
  { timestamps: true }
);

export const PatientRecord = mongoose.model('PatientRecord', patientRecordSchema);

