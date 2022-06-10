const colors = {
    RED: "#f23d5b",
    YELLOW: "#f2c94c",
    GREY: "#757575"
}

function getStatusColor(total, good) {
    let percent = (good[good.length-1] / total[total.length-1]) * 100;
    if (percent > 10 && percent <= 20) {
        return colors.YELLOW;
    }
    if (percent > 20) {
        return colors.RED;
    }
    return colors.GREY;
}