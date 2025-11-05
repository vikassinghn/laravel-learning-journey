# 🚀 Laravel Learning Journey

Welcome to my **Laravel Learning Journey** — a day-by-day documentation of my progress in learning and building with Laravel.  
Each folder in this repository represents a day’s learning topic and hands-on practice.

---

## 📅 Daily Progress

| Day | Topic | Description | Folder |
|-----|--------|--------------|---------|
| 1 | Routing & Blade Templates | Basic routing, controllers, and Blade layout templates | [Day01_Routing_Blade_Templates](./Day01_Routing_Blade_Templates) |
| 2 | Migrations, Seeders & Resource Controller | Learned about database migrations, seeding JSON data, and building RESTful resource controllers. | [Day02_Migrations_Seeders_ResourceController](./Day02_Migrations_Seeders_ResourceController) |
| 3 | CRUD using Eloquent ORM | Implemented Create, Read, Update, and Delete operations using Laravel’s Eloquent ORM with Blade templates. | [Day03_Eloquent_ORM_CRUD](./Day03_Eloquent_ORM_CRUD) |
| 4 | Eloquent Model Conventions | Learned about Laravel’s Eloquent model naming conventions, table mapping, primary key rules, and timestamps handling. | [Day04_Model_Conventions](./Day04_Model_Conventions) |
| 5 | Query Builder & Form Request Validation | Learned Laravel’s Query Builder for complex database queries and implemented Form Request validation for cleaner, reusable validation logic. | [Day05_QueryBuilder_FormRequestValidation](./Day05_QueryBuilder_FormRequestValidation) |
| 6 | One-to-One Relationship | Implemented one-to-one relationship between models using `hasOne` and `belongsTo` methods in Eloquent ORM. | [Day06_OneToOne_Relationship](./Day06_OneToOne_Relationship) |
| 6 | One-to-Many Relationship | Implemented one-to-many relationship between models using `hasMany` and `belongsTo` methods with practical examples. | [Day06_OneToMany_Relationship](./Day06_OneToMany_Relationship) |
| 7 | Has One Through Relationship | Learned how to define indirect one-to-one relationships using `hasOneThrough` to connect models through intermediate relationships. | [Day07_HasOneThrough_Relationship](./Day07_HasOneThrough_Relationship) |
| 7 | One-to-One Polymorphic Relationship | Implemented polymorphic one-to-one relationships to allow multiple models to share a single related model (e.g., image, profile). | [Day07_OneToOne_Polymorphic_Relationship](./Day07_OneToOne_Polymorphic_Relationship) |


> ⚙️ *More days will be added as I continue my journey!*

---

## 🧠 What I’m Learning
- Laravel Fundamentals (Routing, Controllers, Views)
- Blade Templating & Layouts
- Models, Migrations, and Eloquent ORM
- Authentication & Middleware
- API Development with Laravel
- Deployment & Optimization

---

## 🛠️ How to Run Any Project

```bash
# Clone this repository
git clone https://github.com/vikassinghn/laravel-learning-journey.git

# Navigate into a day's folder, e.g.:
cd laravel-learning-journey/routing_and_blade_templates

# Install dependencies
composer install
npm install

# Copy environment file and set up app
cp .env.example .env
php artisan key:generate

# Run local server
php artisan serve
```

Then open:  
👉 **http://localhost:8000**

---

## 🌟 Future Topics (Planned)
- Authentication (Login, Register, Logout)
- Database Relationships
- REST APIs with Laravel
- File Uploads
- Laravel Livewire / Inertia
- Testing in Laravel

---

## 👨‍💻 Author
**Vikas Singh**  
📍 GitHub: [@vikassinghn](https://github.com/vikassinghn)
