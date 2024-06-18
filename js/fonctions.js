// Fonction de validation du numéro de téléphone français
function validatePhoneNumber(phone) {
    const regex = /^(\+33\s?|0)[1-9]([.\s]?\d{2}){4}$/;
    return regex.test(phone);
}

// Fonction de validation de l'email
function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}