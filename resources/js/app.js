import './bootstrap';
import { Datepicker, Input, initTE, Ripple, Collapse} from "tw-elements";

import Alpine from 'alpinejs';
initTE({ Datepicker, Input, Ripple, Collapse })
window.Alpine = Alpine;

Alpine.start();
