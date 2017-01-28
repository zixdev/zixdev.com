export default function (state) {
    if(state) {
        if(localStorage.getItem('token')) {
            return true;
        }
    }
    return false;
}
