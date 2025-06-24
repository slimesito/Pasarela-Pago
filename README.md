# Pasarela de Pago 💳💵

![Laravel 10](https://img.shields.io/badge/Laravel-10-red.svg)
![React 19.1](https://img.shields.io/badge/React-19.1-61DAFB.svg)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4.1.7-38B2AC.svg)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-Database-336791.svg)
![Responsive UI](https://img.shields.io/badge/Responsive-Sí-success.svg)
![Dark/Light Mode](https://img.shields.io/badge/Tema-Claro%20%2F%20Oscuro-informational.svg)

> Esta solución es una pasarela de pagos especializada que permite a **bancos venezolanos** (siendo Bancamiga el primero en implementarla) ofrecer a las empresas registradas un sistema integrado para: Consultar en tiempo real las deudas previsionales con el IVSS y Liquidar dichas obligaciones mediante transacciones seguras.
> Su propósito central es **automatizar el pago de aportes al IVSS** mediante una interfaz bancaria estandarizada, eliminando trámites manuales y reduciendo errores en la declaración de obligaciones.

---

## 📁 Estructura del Proyecto

```bash
Pasarela-Pago-App/
├── Pasarela-Pago-API/    # Backend Laravel 10
│   ├── app/              # Lógica de Aplicación
│   ├── config/           # Configuración
│   └── routes/           # Rutas API definidas
│
└── Frontend/             # Frontend React.js
    ├── public/           # Recursos estáticos
    ├── src/              # Código fuente
    └── package.json      # Dependencias
```

---

## ⚙️ Tecnologías Usadas

- **Laravel 10** – Backend API con autenticación Sanctum y lógica de procesamiento de pagos.
- **React.js 19.1** – Frontend interactivo para consulta de deudas y transacciones.
- **Tailwind CSS 4.1.7** – Sistema de diseño responsive con gestión de temas.
- **PostgreSQL** – Base de datos con triggers y procedimientos para actualización automática de saldos.
- **Docker** – Containerización de servicios y dependencias.
- **Nginx** – Servidor web para frontend y reverse proxy para API en entorno de producción.

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![React](https://img.shields.io/badge/React-61DAFB?style=for-the-badge&logo=react&logoColor=black)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-06B6D4?style=for-the-badge&logo=tailwind-css&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-4169E1?style=for-the-badge&logo=postgresql&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)
![Nginx](https://img.shields.io/badge/Nginx-009639?style=for-the-badge&logo=nginx&logoColor=white)

---

## 🧑‍💻 Funcionalidades

✅ Autenticación segura mediante tokens  
✅ Búsqueda y consulta en tiempo real de deudas empresariales  
✅ Simulación de transacciones de pago con actualización automatizada de saldos  
✅ Mecanismo de trigger/procedimiento para gestión de deudas  
✅ Arquitectura escalable preparada para integración con múltiples bancos  
✅ Generación de reportes en PDF  
✅ Registro de Usuarios sólo para Administradores  

---

## 📸 Capturas de Pantalla

<p><em>Vista Previa de las principales pantallas de la aplicación:</em></p>

<p><strong>Login</strong></p>
<p align="center">
  <img src="./screenshots/login.png" alt="Login" width="80%">
</p>

<p><strong>Dashboard</strong></p>
<p align="center">
  <img src="./screenshots/dashboard.png" alt="Dashboard" width="80%">
</p>

<p><strong>Detalle de búsqueda</strong></p>
<p align="center">
  <img src="./screenshots/detail.png" alt="Detalle de búsqueda" width="70%">
</p>

<p><strong>Pago realizado</strong></p>
<p align="center">
  <img src="./screenshots/payment.png" alt="Pago realizado" width="70%">
</p>

---

## 🚀 Instalación y Ejecución

### 🔧 Backend (Laravel)

```bash
cd Pasarela-Pago-App/Pasarela-Pago-API
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

### 💻 Frontend (React.js)

```bash
cd Pasarela-Pago-App/Frontend
npm install
npm run dev
```

> Asegúrate de que el archivo .env está configurado con tu conexión a tu base de datos PostgreSQL.

---

## 📡 API Endpoints

| Method | Route                | Description              |
|--------|----------------------|--------------------------|
| GET    | /api/deuda/consultar       | Consulta de Deuda |
| POST   | /api/login           | Inicio de Sesión con Token Bearer |
| POST   | /api/logout           | Cierre de Sesión |
| POST   | /api/register        | Registro de Usuarios   |
| POST   | /api/deuda/pagar        | Pago de Deuda   |

---

<!-- ## 🧪 Testing

The system includes tests to verify endpoints and rate limiting:

```bash
php artisan test
```

Verified test cases:

✅ List citizens  
✅ Search citizen by ID number and nationality  
✅ Register new citizen  
✅ Update citizen  
✅ Request limit enforcement  
✅ Blocking after exceeding request limit  
✅ Reset after cooldown period  

--- -->

## 📄 Licencia

Este proyecto es una réplica de demostración, creada exclusivamente para:

- Pruebas técnicas
- Propósitos de portafolio

Queda prohibido cualquier uso comercial sin autorización expresa por escrito.

---

## 🙋‍♂️ Desarrollador

Desarrollado por [William Villegas](https://www.linkedin.com/in/william-villegas-ab3b94215/)
