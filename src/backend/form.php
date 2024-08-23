<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="first-form">
  <fieldset>
    <input type="text" name="first_name" placeholder="Имя" class="first-form-input">
  </fieldset>
  <fieldset>
    <input type="text" name="last_name" placeholder="Фамилия" class="first-form-input">
  </fieldset>
  <fieldset class="datepicker">
    <select name="day" id="day">
    </select>
    <select name="month" id="month">
      <option value="1">Jan</option>
      <option value="2">Feb</option>
      <option value="3">Mar</option>
      <option value="4">Apr</option>
      <option value="5">May</option>
      <option value="6">Jun</option>
      <option value="7">Jul</option>
      <option value="8">Aug</option>
      <option value="9">Sep</option>
      <option value="10">Oct</option>
      <option value="11">Nov</option>
      <option value="12">Dec</option>
    </select>
    <select name="year" id="year">
    </select>
  </fieldset>
  <fieldset>
    <textarea name="_text" id="message-field" placeholder="Напиши сообщение"></textarea>
  </fieldset>
  <fieldset>
    <button type="submit" class="submit-button">Отправить</button>
  </fieldset>
</form>
<script src="form-validation.js"></script>
