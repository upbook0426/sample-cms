setTimeout(function() {
    $(".alert-success,.alert-error")
        .fadeOut(5000)
        .queue(function() {
            this.remove();
        });
  }, 1000);
