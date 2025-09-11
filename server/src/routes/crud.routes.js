import { Router } from 'express';
import { requireAuth } from '../middleware/auth.js';
import { doctorCrud, serviceCrud, appointmentCrud, patientRecordCrud, revenueCrud } from '../controllers/crud.controller.js';

const router = Router();

function mountCrud(path, crud) {
  router.post(path, requireAuth, crud.create);
  router.get(path, crud.list);
  router.get(`${path}/:id`, crud.get);
  router.put(`${path}/:id`, requireAuth, crud.update);
  router.delete(`${path}/:id`, requireAuth, crud.remove);
}

mountCrud('/doctors', doctorCrud);
mountCrud('/services', serviceCrud);
mountCrud('/appointments', appointmentCrud);
mountCrud('/patient-records', patientRecordCrud);
mountCrud('/revenue', revenueCrud);

export default router;

