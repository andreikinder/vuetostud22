class Status {
    static  all(then) {
        return axios.get('/statuses')
    }
}

export default Status
