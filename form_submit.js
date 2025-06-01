document.getElementById('civilForm').addEventListener('submit', async function(e) {
  e.preventDefault();

  const data = {
    roblox: document.getElementById('roblox').value.trim(),
    discord: document.getElementById('discord').value.trim(),
    email: document.getElementById('email').value.trim(),
    category: document.getElementById('category').value.trim(),
    message: document.getElementById('message').value.trim()
  };

  if (!data.roblox || !data.discord || !data.email || !data.category || !data.message) {
    alert("모든 항목을 입력해주세요.");
    return;
  }

  try {
    const response = await fetch('http://php.goldriver.kro.kr/send_civil_request.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify(data)
    });

    const result = await response.json();
    alert(result.message);
    if (result.status === 'success') {
      document.getElementById('civilForm').reset();
    }
  } catch (err) {
    alert("서버와 통신 중 오류가 발생했습니다.");
    console.error(err);
  }
});
