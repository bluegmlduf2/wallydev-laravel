import "./bootstrap";

import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

// ToastUI
// npm install --save @toast-ui/editor@3.2.2
import Editor from "@toast-ui/editor";
import Viewer from "@toast-ui/editor/dist/toastui-editor-viewer";
import "@toast-ui/editor/dist/toastui-editor.css";
import "@toast-ui/editor/dist/toastui-editor-viewer.css";

const viewer = new Viewer({
    el: document.querySelector("#viewer"),
});

const editor = new Editor({
    el: document.querySelector("#editor"),
    height: "500px",
    initialEditType: "wysiwyg",
    previewStyle: "vertical",
    usageStatistics: false,
});

window.viewer = viewer;
window.editor = editor;

// editor.getMarkdown();
// editor.getHtml();
