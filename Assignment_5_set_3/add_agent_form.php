<form method="post" action="add_agent.php">
  <label for="agent_name">Agent name:</label>
  <input type="text" name="name" id="agent_name" required>
  <label for="city">City:</label>
  <select name="city" id="city" required>
    <option value="Pune">Pune</option>
    <option value="Mumbai">Mumbai</option>
    <option value="Chennai">Chennai</option>
  </select>
  <label for="experience">Years of experience:</label>
  <input type="number" name="experience" id="experience" required>
  <button type="submit">Submit</button>
</form>
