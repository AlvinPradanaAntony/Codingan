import React, { Component } from "react";
import "./Dashboard.css"
class Dashboard extends Component {
  render() {
    return (
      <div>
        <div class="sidebar">
          <div class="logo-details">
            <img src="assets/ico/LogoMin.png" alt="Logo" />
            <span class="logo_name">scholLine.id</span>
          </div>
          <ul class="nav-links">
            <li id="dashboard" class="navItem">
              <a href="#">
                <div class="frame-ico">
                  <img src="assets/ico/DashboardIco.png" alt="item1" id="item1" />
                </div>
                <span class="link_name">Dashboard</span>
              </a>
              <ul class="sub-menu blank">
                <li>
                  <a class="link_name" href="#">
                    Dashboard
                  </a>
                </li>
              </ul>
            </li>
            <li id="courses" class="navItem ">
              <a href="#">
                <div class="frame-ico">
                  <img src="assets/ico/School.png" alt="item2" id="item2" />
                </div>
                <span class="link_name">Courses</span>
              </a>
              <ul class="sub-menu blank">
                <li>
                  <a class="link_name" href="#">
                    Courses
                  </a>
                </li>
              </ul>
            </li>
            <li id="schedule" class="navItem">
              <a href="#">
                <div class="frame-ico">
                  <img src="assets/ico/Schedule.png" alt="item3" id="item3" />
                </div>
                <span class="link_name">Schedule</span>
              </a>
              <ul class="sub-menu blank">
                <li>
                  <a class="link_name" href="#">
                    Schedule
                  </a>
                </li>
              </ul>
            </li>
            <li id="teachers" class="navItem">
              <a href="#">
                <div class="frame-ico">
                  <img src="assets/ico/people.png" alt="item4" id="item4" />
                </div>
                <span class="link_name">All Teachers</span>
              </a>
              <ul class="sub-menu blank">
                <li>
                  <a class="link_name" href="#">
                    All Teachers
                  </a>
                </li>
              </ul>
            </li>
            <li id="quiz" class="navItem">
              <a href="#">
                <div class="frame-ico">
                  <img src="assets/ico/Quiz.png" alt="item5" id="item5" />
                </div>
                <span class="link_name">Quiz</span>
              </a>
              <ul class="sub-menu blank">
                <li>
                  <a class="link_name" href="#">
                    Quiz
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <div class="profile-details">
                <div class="profile-content">
                  <img src="assets/ico/profile.jpg" alt="profileImg" />
                </div>
                <div class="name-job">
                  <div class="profile_name">Prem Shahi</div>
                  <div class="job">Web Desginer</div>
                </div>
                <i class="bx bx-log-out"></i>
              </div>
            </li>
          </ul>
        </div>
        <section class="home-section">
          <div class="home-content">
            <div class="menu">
              <i class="bx bx-menu menu-collapse"></i>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadowNavbar">
              <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <form action="https:google.com/search" method="GET" class="search-box">
                    <input type="text" name="q" class="search-txt" placeholder="Search" />
                    <button type="submit" class="search-btn border border-0">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                  </form>
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item d-flex align-items-center">
                      <div id="clockDisplay" class="me-2"></div>
                      <span class="seperatorVertikal me-3"></span>
                    </li>
                    <li class="nav-item dropdown d-flex align-items-center" id="chat">
                      <a class="nav-link dropdown-toggle chat" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="iconChat">
                          <img src="assets/ico/IconChat.png" id="iconChat" />
                        </span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"></ul>
                    </li>
                    <li class="nav-item dropdown d-flex align-items-center notif" id="notification">
                      <a class="nav-link dropdown-toggle notif" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="iconNotification">
                          <img src="assets/ico/IconNotif.png" id="iconNotif" />
                        </span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"></ul>
                    </li>
                    <li class="nav-item dropdown frameProfile">
                      <a class="nav-link dropdown-toggle nav-user" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="account-user-avatar d-inline-block">
                          <img src="assets/ico/profile.jpg" class="rounded-circle" />
                        </span>
                        <span>
                          <span class="account-user-name">Kelompok 3</span>
                          <span class="account-position">Student</span>
                        </span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end me-1 border border-0 custom-rounded" aria-labelledby="navbarDropdown">
                        <li>
                          <a class="dropdown-item custom-item-dropdown d-flex align-items-center" href="#">
                            <i class="bx bxs-user s-14 me-2"></i>
                            <span class="nameItem">My Profile</span>
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item custom-item-dropdown d-flex align-items-center" href="#">
                            <i class="bx bxs-edit s-14 me-2"></i>
                            <span class="nameItem">Edit Profile</span>
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item custom-item-dropdown d-flex align-items-center" href="#">
                            <i class="bx bx-log-out s-14 me-2"></i>
                            <span class="nameItem">Sign Out</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            <div class="content">
              <div class="container"></div>
            </div>
          </div>
        </section>
      </div>
    );
  }
}

export default Dashboard;
