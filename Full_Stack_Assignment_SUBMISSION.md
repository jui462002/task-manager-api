# FINAL SUBMISSION ✅

## GitHub Repositories
```
Backend:   https://github.com/jui462002/task-manager-api
Service:   https://github.com/jui462002/overdue-service
Frontend:  https://github.com/jui462002/task-frontend
```

## Test Credentials
```
Admin:  admin@example.com / password123
User:   user@example.com / password123
```

## Quick Start (Local Testing)
```bash
# Terminal 1: Laravel
cd C:\Users\Admin\task-manager
php artisan serve
# Runs on http://127.0.0.1:8000

# Terminal 2: Django
cd C:\overdue-service
python manage.py runserver 8001
# Runs on http://127.0.0.1:8001

# Terminal 3: React
cd C:\task-frontend
npm run dev
# Runs on http://localhost:3000
```

## Test Results
| Component | Tests | Status |
|-----------|-------|--------|
| React Frontend | 8 | ✅ PASS |
| Backend API | 7 | ✅ PASS |
| Django Overdue | 5 | ✅ PASS |
| **TOTAL** | **20** | **✅ 100%** |

## Features Implemented ✅
- User authentication (Sanctum)
- Role-based access (Admin/User)
- Project CRUD operations
- Task management (4 statuses)
- **Feature 1**: Auto-detect overdue tasks
- **Feature 2**: Block OVERDUE→IN_PROGRESS transitions
- **Feature 3**: Admin-only close overdue tasks
- React UI with protected routes
- API validation & error handling

## API Endpoints
```
POST   /api/login
GET    /api/projects
POST   /api/projects (admin)
GET    /api/tasks
GET    /api/my-tasks
POST   /api/tasks (admin)
PUT    /api/tasks/{id}

Django:
POST   /api/tasks/check-overdue/
POST   /api/tasks/validate-transition/
GET    /api/tasks/overdue-list/
```

## Database Schema
- **users**: id, name, email, password, role, timestamps
- **projects**: id, name, description, timestamps
- **tasks**: id, title, status, priority, due_date, project_id (FK), user_id (FK), timestamps

## Status
✅ All features complete
✅ All tests passing
✅ Code on GitHub
✅ Ready for evaluation

**Submission Date**: April 10, 2026
