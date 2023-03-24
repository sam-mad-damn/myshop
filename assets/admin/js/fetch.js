//запрос на получение данных(получить категории например)
async function getData(route, params = "") {
    if (params != "") {
        route += `?${params}`
    }
    let response = await fetch(route);
    return await response.json();
}

//передача данных в формате JSON
async function postJSON(route, data, action=null) {
    let response = await fetch(route, {
        method: "POST",
        headers: {
            "Content-Type": "application/json;charset=UTF-8"
        },
        body: JSON.stringify({ data, action })
    });
    return await response.json();
}