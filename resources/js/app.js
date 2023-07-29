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

const viewerId = document.querySelector("#viewer");
const viewer = viewerId
    ? new Viewer({
          el: viewerId,
      })
    : null;

const editorId = document.querySelector("#editor");
const editor = editorId
    ? new Editor({
          el: document.querySelector("#editor"),
          height: "65vh",
          initialEditType: "wysiwyg",
          previewStyle: "vertical",
          usageStatistics: false,
          hooks: {
              addImageBlobHook: async (blob, callback) => {
                  const formData = new FormData();
                  formData.append("image", blob);

                  try {
                      const response = await fetch("/image", {
                          method: "POST",
                          body: formData,
                          headers: {
                              Accept: "application/json",
                          },
                      });

                      if (!response.ok) {
                          throw new Error(
                              `HTTP error! status: ${response.status}`
                          );
                      }

                      const data = await response.json();

                      return callback(data.url);
                  } catch (error) {
                      console.error("Error:", error);
                  }
              },
          },
      })
    : null;

window.viewer = viewer;
window.editor = editor;

// editor.getMarkdown();
// editor.getHtml();
