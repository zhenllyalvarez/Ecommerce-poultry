document.getElementById('loginForm').addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    // Client-side validation
    const email = formData.get('email');
    const password = formData.get('password');
    if (!email || !password) {
        Swal.fire({
            title: "Error!",
            text: "Please fill in all fields.",
            icon: "error"
        });
        return;
    }

    try {
        const response = await fetch("/simple_ecommerce/Route/UserRoute/UserLogin.php", {
            method: "POST",
            body: formData
        });

        // Check for HTTP errors
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        // Parse JSON response
        let result;
        try {
            result = await response.json();
        } catch (error) {
            console.error("Error parsing JSON:", error);
            Swal.fire({
                title: "Error!",
                text: "Invalid server response.",
                icon: "error"
            });
            return;
        }

        // Show result to user
        Swal.fire({
            title: result.status === "success" ? "Success!" : "error",
            text: result.message,
            icon: result.status
        }).then(() => {
            if (result.status === "success") {
                window.location.href = "/simple_ecommerce/View/Dashboard.php";
            }
        });
    } catch (error) {
        console.error("Error:", error);
        Swal.fire({
            title: "Error!",
            text: "Something went wrong. Please try again.",
            icon: "error"
        });
    }
});