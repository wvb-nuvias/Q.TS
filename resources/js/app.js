import './bootstrap';
import './../../vendor/power-components/livewire-powergrid/dist/powergrid';
import './../../vendor/power-components/livewire-powergrid/dist/tailwind.css';
import Chart from 'chart.js/auto';
import { getRelativePosition } from 'chart.js/helpers';

import jQuery from 'jquery';
window.$ = jQuery;

import Alpine from 'alpinejs'
import { createPopper } from "@popperjs/core";

import focus from '@alpinejs/focus'

Alpine.plugin(focus)

//window.Alpine = Alpine;
//Alpine.start()

window.createPopper = createPopper;
