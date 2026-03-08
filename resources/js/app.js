import './bootstrap';
import 'flowbite';
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

flatpickr("#date", {
    dateFormat: "d-m-Y",
    allowInput: true,
});
