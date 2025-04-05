fetch("https://ipinfo.io/json?token=fd667eac878240")
  .then(res => res.json())
  .then(data => {
    const city = data.city || "your city";
    const country = data.country;

    let estimate = "";
    let shippingCost = "";

    switch (country) {
      case "GB":
        estimate = "2–3 Days";
        shippingCost = "£2.99";
        break;
      case "FR":
      case "DE":
      case "ES":
      case "IT":
        estimate = "4–5 Days";
        shippingCost = "£5.99";
        break;
      case "US":
      case "CA":
        estimate = "5–7 Days";
        shippingCost = "£9.99";
        break;
      default:
        estimate = "7–10 Days";
        shippingCost = "£14.99";
    }

    document.getElementById("shipping-estimate").innerHTML = `
      <i class="bi bi-box-seam"></i> Shipping to <strong>${city}, ${country}</strong><br>
      <i class="bi bi-truck"></i> <strong>${estimate}</strong> – Estimated<br>
      <i class="bi bi-cash-coin"></i> Shipping Cost: <strong>${shippingCost}</strong>
    `;
  })
  .catch(() => {
    document.getElementById("shipping-estimate").innerHTML =
      '<i class="bi bi-exclamation-triangle"></i> Unable to detect location for shipping estimate.';
  });
