import React, { Component } from "react";
import axios from 'axios';

export default class Login extends Component {

    constructor(props){
        super(props)

        this.state = {
            email: '',
            password: ''
        }
    }

    changeHandler = e => {
        this.setState({[e.target.name]: e.target.value})
    }

    submitHandler = e => {
        e.preventDefault()
        console.log(this.state)
        axios
        .post('https://jsonplaceholder.typicode.com/users', this.state)
        //.post('http://192.168.1.35:3000/sign-in', this.state)
        .then(response => {
            console.log(response)
        })
        .catch(error => {
            console.log(error)
        })
    }

    render() {
        const { email, password } = this.state
        return (
            <form onSubmit={this.submitHandler}>
                <h3>Sign In</h3>

                <div className="form-group">
                    <label>Email address</label>
                    <input type="email" className="form-control" name="email" placeholder="Enter email" value={email} onChange={this.changeHandler}/>
                </div>

                <div className="form-group">
                    <label>Password</label>
                    <input type="password" className="form-control"  name="password" placeholder="Enter password" value={password} onChange={this.changeHandler}/>
                </div>

                <div className="form-group">
                    <div className="custom-control custom-checkbox">
                        <input type="checkbox" className="custom-control-input" id="customCheck1" />
                        <label className="custom-control-label" htmlFor="customCheck1">Remember me</label>
                    </div>
                </div>

                <button type="submit" onClick={this.onSubmit} href="/home" className="btn btn-primary btn-block">Submit</button>
            </form>
        );
    }
}