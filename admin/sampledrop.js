<html>
<head>
</head>
<body>

<form>


<select name="options[70]" id="select_70">
  <option value="1" price="0"> test-1 </option>
  <option value="2" price="0"> test-2 </option>
  <option value="3" price="0"> test-3 </option>
</select>
<select name="options[71]" id="select_71">
  <option value="4" price="0"> test-1 </option>
  <option value="5" price="0"> test-2 </option>
  <option value="6" price="0"> test-3 </option>
</select>
<select name="options[72]" id="select_72">
  <option value="7" price="0"> test-1 </option>
  <option value="8" price="0"> test-2 </option>
  <option value="9" price="0"> test-3 </option>
</select>
<select name="options[73]" id="select_73">
  <option value="10" price="0"> test-1 </option>
  <option value="11" price="0"> test-2 </option>
  <option value="12" price="0"> test-3 </option>
</select>
<select name="options[74]" id="select_74">
  <option value="13" price="0"> test-1 </option>
  <option value="14" price="0"> test-2 </option>
  <option value="15" price="0"> test-3 </option>
</select>

<script type="text/javascript"> 
  var $selects = $('select');
$selects.on('change', function() {
  var $select = $(this),
    $options = $selects.not($select).find('option'),
    selectedText = $select.children('option:selected').text();

  var $optionsToDisable = $options.filter(function() {
    return $(this).text() == selectedText;
  });

  $optionsToDisable.prop('disabled', true);
});

//to apply initial selection
$selects.eq(0).trigger('change');
</script>
</form>
</body>
</html>