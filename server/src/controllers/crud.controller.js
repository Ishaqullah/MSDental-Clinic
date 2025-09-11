import { Doctor } from '../models/Doctor.js';
import { Service } from '../models/Service.js';
import { Appointment } from '../models/Appointment.js';
import { PatientRecord } from '../models/PatientRecord.js';
import { Revenue } from '../models/Revenue.js';

function buildCrud(model) {
  return {
    async create(req, res) {
      try {
        const doc = await model.create(req.body);
        return res.status(201).json(doc);
      } catch (error) {
        return res.status(400).json({ message: 'Create failed', error: error.message });
      }
    },
    async list(req, res) {
      try {
        const docs = await model.find({}).limit(200);
        return res.json(docs);
      } catch (error) {
        return res.status(500).json({ message: 'List failed', error: error.message });
      }
    },
    async get(req, res) {
      try {
        const doc = await model.findById(req.params.id);
        if (!doc) return res.status(404).json({ message: 'Not found' });
        return res.json(doc);
      } catch (error) {
        return res.status(400).json({ message: 'Get failed', error: error.message });
      }
    },
    async update(req, res) {
      try {
        const doc = await model.findByIdAndUpdate(req.params.id, req.body, { new: true });
        if (!doc) return res.status(404).json({ message: 'Not found' });
        return res.json(doc);
      } catch (error) {
        return res.status(400).json({ message: 'Update failed', error: error.message });
      }
    },
    async remove(req, res) {
      try {
        const doc = await model.findByIdAndDelete(req.params.id);
        if (!doc) return res.status(404).json({ message: 'Not found' });
        return res.json({ success: true });
      } catch (error) {
        return res.status(400).json({ message: 'Delete failed', error: error.message });
      }
    },
  };
}

export const doctorCrud = buildCrud(Doctor);
export const serviceCrud = buildCrud(Service);
export const appointmentCrud = buildCrud(Appointment);
export const patientRecordCrud = buildCrud(PatientRecord);
export const revenueCrud = buildCrud(Revenue);

