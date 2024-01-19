import './bootstrap';

import { Datepicker, Input, initTE, Ripple, Collapse, ChipsInput, Chip, Validation, Modal, Select} from "tw-elements";
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

initTE({ Datepicker, Input, Ripple, Collapse, ChipsInput, Chip, Validation, Modal,Select })
window.Alpine = Alpine;
Alpine.plugin(focus);

Alpine.start();
