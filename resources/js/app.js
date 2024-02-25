import './bootstrap';

// Theme Styles AdminKit Pro
import "../scss/_app.scss";

// Bootstrap 5
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

// Bootstrap Toaster Plugin
import { Toast, TOAST_STATUS, TOAST_THEME, TOAST_PLACEMENT } from "bootstrap-toaster";
window.Toast = Toast;

// Alpine JS
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
