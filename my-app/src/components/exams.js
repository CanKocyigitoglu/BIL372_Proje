import React, { Component } from "react";

export default class students extends Component {

    render() {
        return (
            <div className="auth-inner-exams">
                <h3>EXAMS</h3>
                <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">Finish Time</th>
                    <th scope="col">Exam Date</th>
                    <th scope="col">%</th>
                    <th scope="col">Total Exam Time</th>
                    <th scope="col">Total Question Number</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>14:30</td>
                    <td>16:30</td>
                    <td>12.12.2020</td>
                    <td>40</td>
                    <td>120</td>
                    <td>6</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>18:30</td>
                    <td>19:30</td>
                    <td>20.12.2020</td>
                    <td>35</td>
                    <td>60</td>
                    <td>3</td>
                    </tr>
                </tbody>
                </table>
            </div>
        );
    }
}