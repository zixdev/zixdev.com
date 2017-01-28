import Component from "vue-class-component";
import tinymce from "tinymce/tinymce";
import "tinymce/themes/modern/theme";
import "tinymce/plugins/paste/plugin";
import "tinymce/plugins/link/plugin";
import "tinymce/plugins/autoresize/plugin";
import "tinymce/skins/lightgray/skin.min.css";
import "tinymce/skins/lightgray/content.min.css";

@Component({
    template: `
        <textarea
            class="tinymce"
            rows="10"
        >
        </textarea>        
    `,
    props: {
        content: {
            required: true,
            type: String,
        }
    },
    name: 'tinymce-editor'
})
export default class TinymceEditor {
    mounted() {
        this.$events.$on('update-tinycme', data => {
            this.createTinyMce(data);
        });
    }

    createTinyMce(content) {
        tinymce.remove();
        var self = this;
        // Initialize
        tinymce.init({
            selector: '.tinymce',
            skin: false,
            plugins: ['paste', 'link', 'autoresize'],
            setup(editor) {

                editor.on('init', function () {
                    tinymce.activeEditor.setContent(content);
                });
                // when typing keyup event
                editor.on('keyup', function () {
                    self.$emit('change', tinymce.activeEditor.getContent());
                });
            }
        });
    }

}
