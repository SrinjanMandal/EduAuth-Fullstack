# 🎓 EduAuth Fullstack

A complete **full-stack authentication and teacher management system** built with **CodeIgniter 4 (PHP)** and **React.js**, powered by **PostgreSQL/MySQL**.

---

## 📖 About

**EduAuth Fullstack** is a demonstration of a production-ready authentication and data management application.  
It provides secure **JWT-based user authentication** and maintains a **1:1 relationship** between `auth_user` and `teachers` tables.  

This project was designed as an **internship-level fullstack developer task**, but structured to be **scalable and deployment-ready**.

### Features
- 🔑 **Authentication**
  - Register new users
  - Login with email & password
  - JWT token–based protected routes
- 👨‍🏫 **Teacher Management**
  - Separate `auth_user` and `teachers` tables
  - 1-to-1 relationship with `user_id` as foreign key
  - Insert data into both tables via a **single POST API**
- 🌐 **Backend (CodeIgniter 4)**
  - RESTful APIs
  - Middleware for token authentication
- 🖥️ **Frontend (React.js)**
  - Login & registration forms
  - Teacher data displayed in datatables
  - Protected pages with token-based access
- 📂 **Database**
  - SQL schema (`database.sql`) for PostgreSQL/MySQL
  - Postman collection for quick API testing

---

## 🚀 Tech Stack

**Backend:** CodeIgniter 4 (PHP), JWT  
**Frontend:** React.js (Vite), Axios, Tailwind CSS / Material UI  
**Database:** PostgreSQL / MySQL  
**Tools:** Postman, Git, Composer, npm

---

## ⚙️ Setup Instructions

### 1️⃣ Clone Repository
```bash
git clone https://github.com/your-username/eduauth-fullstack.git
cd eduauth-fullstack


## 🚀 Setup

1. Import the database from `database/database.sql`  
2. Test APIs using `database/postman_collection.json` in Postman  
3. Follow instructions in backend & frontend folders to run the project



## 📜 License

MIT License
