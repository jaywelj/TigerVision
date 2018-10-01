$('select[name=team2]').on('change', function() {
   var self = this;
   $('select[name=team1]').find('option').prop('disabled', function() {
       return this.value == self.value
   });
});

$('select[name=team1]').on('change', function() {
  var self = this;
  $('select[name=team2]').find('option').prop('disabled', function() {
      return this.value == self.value
  });
}); 
