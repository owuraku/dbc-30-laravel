<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    function submitDeleteForm(button){
        const userResponse = confirm('Are you sure you want to delete?');
        if (userResponse){
           const form = button.parentElement;
           form.submit();            
        }
    }
</script>