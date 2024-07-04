/**
 * Shows a popup message to the screen
 * @param {*} message
 * 
 * The message to be shown 
 */
export function makeToastNotification(message) {

    const flashes = document.getElementById("flashes")

    if (flashes) {
        const notification = document.createElement("div")
        notification.className = "message"
        notification.innerHTML = message
        flashes.appendChild(notification)
        notification.classList.add("active")

        setTimeout(() => {
            notification.classList.remove("active")
            setTimeout(() => {
                notification.remove()
            }, 500);
        }, 1500);
    }
    
}