<?php
// Page de contact
?>

<section id="contact" class="section">
    <div class="container">
        <h1 class="section-title">Contactez-moi</h1>
        <p class="section-description">N'hésitez pas à me contacter pour toute question, collaboration ou opportunité
            professionnelle.</p>

        <?php
        // Traitement du formulaire
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $subject = trim($_POST['subject']);
            $message = trim($_POST['message']);

            $errors = [];

            // Validation
            if (empty($name)) {
                $errors[] = "Le nom est requis.";
            }
            if (empty($email)) {
                $errors[] = "L'email est requis.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'email n'est pas valide.";
            }
            if (empty($subject)) {
                $errors[] = "Le sujet est requis.";
            }
            if (empty($message)) {
                $errors[] = "Le message est requis.";
            }

            if (empty($errors)) {
                // Préparer l'email
                $to = 'thomas.eugene.62250@gmail.com';
                $email_subject = "Nouveau message de contact : " . $subject;
                $email_message = "Nom : $name\n";
                $email_message .= "Email : $email\n\n";
                $email_message .= "Message :\n$message\n";

                $headers = "From: $email\r\n";
                $headers .= "Reply-To: $email\r\n";
                $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

                // Envoyer l'email
                if (mail($to, $email_subject, $email_message, $headers)) {
                    echo '<div class="success-message">Votre message a été envoyé avec succès !</div>';
                } else {
                    echo '<div class="error-message">Erreur lors de l\'envoi du message. Veuillez réessayer.</div>';
                }
            } else {
                echo '<div class="error-message"><ul>';
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo '</ul></div>';
            }
        }
        ?>

        <form action="?page=contact" method="post" class="contact-form">
            <div class="form-group">
                <label for="name">Nom *</label>
                <input type="text" id="name" name="name" required
                    value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required
                    value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="subject">Sujet *</label>
                <input type="text" id="subject" name="subject" required
                    value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="message">Message *</label>
                <textarea id="message" name="message" rows="6"
                    required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer le message</button>
        </form>
    </div>
</section>

<style>
    .contact-form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background: var(--bg-color);
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: var(--text-color);
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid var(--border-color);
        border-radius: 4px;
        background: white;
        color: var(--text-color);
        font-size: 16px;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .btn {
        padding: 12px 24px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .btn-primary {
        background: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background: var(--primary-hover);
    }

    .success-message {
        background: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
        border: 1px solid #c3e6cb;
    }

    .error-message {
        background: #f8d7da;
        color: #721c24;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
        border: 1px solid #f5c6cb;
    }

    .error-message ul {
        margin: 0;
        padding-left: 20px;
    }

    .error-message li {
        margin-bottom: 5px;
    }
</style>
</content>
<parameter name="filePath">/home/thomas/Documents/GitHub/portfolio/pages/contact.php