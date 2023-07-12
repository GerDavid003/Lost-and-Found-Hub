<form action="{{ route('item.submit') }}" method="POST">
  @csrf

  <label for="description">Item Description:</label>
  <input type="text" id="description" name="description" required>

  <label for="category">Category:</label>
  <select id="category" name="category" required>
    <option value="laptop">Laptop</option>
    <option value="charger">Charger</option>
  </select>

  <label for="location">Location:</label>
  <input type="text" id="location" name="location" required>

  <label for="contact">Contact Details:</label>
  <input type="text" id="contact" name="contact" required>

  <button type="submit">Submit</button>
</form>
