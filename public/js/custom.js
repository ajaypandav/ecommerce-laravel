// Allow Numbers only
jQuery(document).on('input', '.number', function(event) {
    this.value = this.value.replace(/[^0-9]/g, '');
});
// Allow Numbers with decimal only
jQuery(document).on('input', '.number-decimal', function(event) {
    this.value = this.value.replace(/[^0-9.]/g, '');
});