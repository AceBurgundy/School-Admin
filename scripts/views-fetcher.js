export const fetchData = async file => {
    const response = await fetch(file);
  
    if (!response.ok) {
      const errorMessage = await response.json();
      console.error('Network response was not ok:', response.status, errorMessage.error);
      return
    }
  
    return await response.json();
  }
  