import './bootstrap';

// Theme Styles AdminKit Pro
import "../scss/_app.scss";

// Bootstrap 5
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

// Bootstrap Toaster Plugin
import { Toast, TOAST_STATUS, TOAST_THEME, TOAST_PLACEMENT } from "bootstrap-toaster";
window.Toast = Toast;

// Sweet Alert2 JS & CSS (Auto Include)
import Swal from 'sweetalert2';
window.Swal = Swal;

// Alpine JS
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Flatpickr
import flatpickr from "flatpickr";
window.flatpickr = flatpickr;

import TomSelect from "tom-select";
window.TomSelect = TomSelect

import './../../vendor/power-components/livewire-powergrid/dist/powergrid'

// AdminKit (required)
import "./modules/sidebar";
import "./modules/theme";
import "./modules/fullscreen";
import "./modules/feather";


// custom JS
import '../../public/assets/js/main'

