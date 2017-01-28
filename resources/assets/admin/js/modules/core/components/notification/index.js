import Component from "vue-class-component";
import toastr from 'toastr';

@Component({
    template: `
               
    `,
})
export default class Notification {
    created() {
        this.$events.$on('notify', (data) => {
            this.notify(data);
        });
    }
    run() {
        this.notify({
            type: 'info',
            title: 'Congrats',
            message: 'you such an ass whole'
        })
    }

    notify(data) {
        toastr.options.closeButton = true;
        toastr.options.escapeHtml = true;
        toastr.options.progressBar = true;

        toastr.options.rtl = true;

        toastr[data.type](data.message, data.title, {timeOut: 500000});
    }



}
