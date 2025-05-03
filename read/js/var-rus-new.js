
const Sccopy = "/suttacentral.net";
const suttaArea = document.getElementById("sutta");
const homeButton = document.getElementById("home-button");
const fdgButton = document.getElementById("fdg-button");

const bodyTag = document.querySelector("body");
const previous = document.getElementById("previous");
const next = document.getElementById("next");
const previous2 = document.getElementById("previous2");
const next2 = document.getElementById("next2");
const form = document.getElementById("form");
const citation = document.getElementById("paliauto");
const pathLang = "ru";

citation.focus();
let language = "pli-rus";

homeButton.addEventListener("click", () => {
  document.location.search = "";
});

// pressing enter will "submit" the citation and load
form.addEventListener("submit", e => {
  e.preventDefault();
  if (citation.value) {
    buildSutta(citation.value.replace(/\s+/g, " "));
    history.pushState({ page: citation.value.replace(/\s+/g, " ") }, "", `?q=${citation.value.replace(/\s+/g, " ")}`);
  }
});

function buildSutta(slug) {
  
  let translator = "";
  let texttype = "sutta";
  let slugArray = slug.split("&");
  slug = slugArray[0];
  if (slugArray[1]) {
    translator = slugArray[1];
  } 
  /*else {
    translator = "sv";
  }*/
  slug = slug.toLowerCase();

  if ((!slug.match("bu-pm")) && (!slug.match("bi-pm")) && (slug.match(/bu-|bi-|kd|pvr/))) {
    translator = "brahmali";
    texttype = "vinaya";
    slug = slug.replace(/bu([psan])/, "bu-$1");
    slug = slug.replace(/bi([psn])/, "bi-$1");
    if (!slug.match("pli-tv-")) {
      slug = "pli-tv-" + slug;
    }
    if (!slug.match("vb-")) {
      slug = slug.replace("bu-", "bu-vb-");
    }
    if (!slug.match("vb-")) {
      slug = slug.replace("bi-", "bi-vb-");
    }
  }

  if (slug.match(/bu-pm|bi-pm/)) {
    texttype = "vinaya";
    slug = slug.replace(/bu([psan])/, "bu-$1");
    slug = slug.replace(/bi([psan])/, "bi-$1");
    if (!slug.match("pli-tv-")) {
      slug = "pli-tv-" + slug;
    }
  }
  let html = `<div class="button-area"><button id="language-button" class="hide-button">Pāḷi Рус</button></div>`;
  
  const slugReady = parseSlug(slug);
  console.log("slugReady is " + slugReady + " slug is " + slug); 



$.ajax({
       url: "/read/translator-lookup.php?fromjs=" +texttype +"/" +slugReady
    }).done(function(data) {
      const trnsResp = data.split(" ");
      let translator = trnsResp[0];
      console.log('inside', translator);

//if (slug.match(/^mn([1-9]|1[0-9]|2[0-1])$/)) {
 
const onlynumber = slug.replace(/[a-zA-Z]/g, '');

let anranges = ['an1.1-10', 'an1.11-20', 'an1.21-30', 'an1.31-40', 'an1.41-50', 'an1.51-60', 'an1.61-70', 'an1.71-81', 'an1.82-97', 'an1.98-139', 'an1.140-149', 'an1.150-169', 'an1.170-187', 'an1.188-197', 'an1.198-208', 'an1.209-218', 'an1.219-234', 'an1.235-247', 'an1.248-257', 'an1.258-267', 'an1.268-277', 'an1.278-286', 'an1.287-295', 'an1.296-305', 'an1.306-315', 'an1.316-332', 'an1.333-377', 'an1.378-393', 'an1.394-574', 'an1.575-615', 'an1.616-627', 'an2.1-10', 'an2.11-20', 'an2.21-31', 'an2.32-41', 'an2.42-51', 'an2.52-63', 'an2.64-76', 'an2.77-86', 'an2.87-97', 'an2.98-117', 'an2.118-129', 'an2.130-140', 'an2.141-150', 'an2.151-162', 'an2.163-179', 'an2.180-229', 'an2.230-279', 'an2.280-309', 'an2.310-479', 'an3.1', 'an3.2', 'an3.3', 'an3.4', 'an3.5', 'an3.6', 'an3.7', 'an3.8', 'an3.9', 'an3.10', 'an3.11', 'an3.12', 'an3.13', 'an3.14', 'an3.15', 'an3.16', 'an3.17', 'an3.18', 'an3.19', 'an3.20', 'an3.21', 'an3.22', 'an3.23', 'an3.24', 'an3.25', 'an3.26', 'an3.27', 'an3.28', 'an3.29', 'an3.30', 'an3.31', 'an3.32', 'an3.33', 'an3.34', 'an3.35', 'an3.36', 'an3.37', 'an3.38', 'an3.39', 'an3.40', 'an3.41', 'an3.42', 'an3.43', 'an3.44', 'an3.45', 'an3.46', 'an3.47', 'an3.48', 'an3.49', 'an3.50', 'an3.51', 'an3.52', 'an3.53', 'an3.54', 'an3.55', 'an3.56', 'an3.57', 'an3.58', 'an3.59', 'an3.60', 'an3.61', 'an3.62', 'an3.63', 'an3.64', 'an3.65', 'an3.66', 'an3.67', 'an3.68', 'an3.69', 'an3.70', 'an3.71', 'an3.72', 'an3.73', 'an3.74', 'an3.75', 'an3.76', 'an3.76', 'an3.77', 'an3.77', 'an3.78', 'an3.79', 'an3.80', 'an3.81', 'an3.82', 'an3.83', 'an3.84', 'an3.85', 'an3.86', 'an3.87', 'an3.88', 'an3.89', 'an3.90', 'an3.91', 'an3.92', 'an3.93', 'an3.94', 'an3.95', 'an3.96', 'an3.97', 'an3.98', 'an3.99', 'an3.100', 'an3.101', 'an3.102', 'an3.103', 'an3.104', 'an3.105', 'an3.106', 'an3.107', 'an3.108', 'an3.109', 'an3.110', 'an3.111', 'an3.112', 'an3.113', 'an3.114', 'an3.115', 'an3.116', 'an3.117', 'an3.118', 'an3.119', 'an3.120', 'an3.121', 'an3.122', 'an3.123', 'an3.124', 'an3.125', 'an3.126', 'an3.127', 'an3.128', 'an3.129', 'an3.130', 'an3.131', 'an3.132', 'an3.133', 'an3.134', 'an3.135', 'an3.136', 'an3.137', 'an3.138', 'an3.139', 'an3.140', 'an3.141', 'an3.142', 'an3.143', 'an3.144', 'an3.145', 'an3.146', 'an3.147', 'an3.148', 'an3.149', 'an3.150', 'an3.151', 'an3.152', 'an3.153', 'an3.154', 'an3.155', 'an3.156-162', 'an3.163-182', 'an3.183-352', 'an4.1', 'an4.2', 'an4.3', 'an4.4', 'an4.5', 'an4.6', 'an4.7', 'an4.8', 'an4.9', 'an4.10', 'an4.11', 'an4.12', 'an4.13', 'an4.14', 'an4.15', 'an4.16', 'an4.17', 'an4.18', 'an4.19', 'an4.20', 'an4.21', 'an4.22', 'an4.23', 'an4.24', 'an4.25', 'an4.26', 'an4.27', 'an4.28', 'an4.29', 'an4.30', 'an4.31', 'an4.32', 'an4.33', 'an4.34', 'an4.35', 'an4.36', 'an4.37', 'an4.38', 'an4.39', 'an4.40', 'an4.41', 'an4.42', 'an4.43', 'an4.44', 'an4.45', 'an4.46', 'an4.47', 'an4.48', 'an4.49', 'an4.50', 'an4.51', 'an4.52', 'an4.53', 'an4.54', 'an4.55', 'an4.56', 'an4.57', 'an4.58', 'an4.59', 'an4.60', 'an4.61', 'an4.62', 'an4.63', 'an4.64', 'an4.65', 'an4.66', 'an4.67', 'an4.68', 'an4.69', 'an4.70', 'an4.71', 'an4.72', 'an4.73', 'an4.74', 'an4.75', 'an4.76', 'an4.77', 'an4.78', 'an4.79', 'an4.80', 'an4.81', 'an4.82', 'an4.83', 'an4.84', 'an4.85', 'an4.86', 'an4.87', 'an4.88', 'an4.89', 'an4.90', 'an4.91', 'an4.92', 'an4.93', 'an4.94', 'an4.95', 'an4.96', 'an4.97', 'an4.98', 'an4.99', 'an4.100', 'an4.101', 'an4.102', 'an4.103', 'an4.104', 'an4.105', 'an4.106', 'an4.107', 'an4.108', 'an4.109', 'an4.110', 'an4.111', 'an4.112', 'an4.113', 'an4.114', 'an4.115', 'an4.116', 'an4.117', 'an4.118', 'an4.119', 'an4.120', 'an4.121', 'an4.122', 'an4.123', 'an4.124', 'an4.125', 'an4.126', 'an4.127', 'an4.128', 'an4.129', 'an4.130', 'an4.131', 'an4.132', 'an4.133', 'an4.134', 'an4.135', 'an4.136', 'an4.137', 'an4.138', 'an4.139', 'an4.140', 'an4.141', 'an4.142', 'an4.143', 'an4.144', 'an4.145', 'an4.146', 'an4.147', 'an4.148', 'an4.149', 'an4.150', 'an4.151', 'an4.152', 'an4.153', 'an4.154', 'an4.155', 'an4.156', 'an4.157', 'an4.158', 'an4.159', 'an4.160', 'an4.161', 'an4.162', 'an4.163', 'an4.164', 'an4.165', 'an4.166', 'an4.167', 'an4.168', 'an4.169', 'an4.170', 'an4.171', 'an4.172', 'an4.173', 'an4.174', 'an4.175', 'an4.176', 'an4.177', 'an4.178', 'an4.179', 'an4.180', 'an4.181', 'an4.182', 'an4.183', 'an4.184', 'an4.185', 'an4.186', 'an4.187', 'an4.188', 'an4.189', 'an4.190', 'an4.191', 'an4.192', 'an4.193', 'an4.194', 'an4.195', 'an4.196', 'an4.197', 'an4.198', 'an4.199', 'an4.200', 'an4.201', 'an4.202', 'an4.203', 'an4.204', 'an4.205', 'an4.206', 'an4.207', 'an4.208', 'an4.209', 'an4.210', 'an4.211', 'an4.212', 'an4.213', 'an4.214', 'an4.215', 'an4.216', 'an4.217', 'an4.218', 'an4.219', 'an4.220', 'an4.221', 'an4.222', 'an4.223', 'an4.224', 'an4.225', 'an4.226', 'an4.227', 'an4.228', 'an4.229', 'an4.230', 'an4.231', 'an4.232', 'an4.233', 'an4.234', 'an4.235', 'an4.236', 'an4.237', 'an4.238', 'an4.239', 'an4.240', 'an4.241', 'an4.242', 'an4.243', 'an4.244', 'an4.245', 'an4.246', 'an4.247', 'an4.248', 'an4.249', 'an4.250', 'an4.251', 'an4.252', 'an4.253', 'an4.254', 'an4.255', 'an4.256', 'an4.257', 'an4.258', 'an4.259', 'an4.260', 'an4.261', 'an4.262', 'an4.263', 'an4.264', 'an4.265', 'an4.266', 'an4.267', 'an4.268', 'an4.269', 'an4.270', 'an4.271', 'an4.272', 'an4.273', 'an4.274', 'an4.275', 'an4.276', 'an4.277-303', 'an4.304-783', 'an5.1', 'an5.2', 'an5.3', 'an5.4', 'an5.5', 'an5.6', 'an5.7', 'an5.8', 'an5.9', 'an5.10', 'an5.11', 'an5.12', 'an5.13', 'an5.14', 'an5.15', 'an5.16', 'an5.17', 'an5.18', 'an5.19', 'an5.20', 'an5.21', 'an5.22', 'an5.23', 'an5.24', 'an5.25', 'an5.26', 'an5.27', 'an5.28', 'an5.29', 'an5.30', 'an5.31', 'an5.32', 'an5.33', 'an5.34', 'an5.35', 'an5.36', 'an5.37', 'an5.38', 'an5.39', 'an5.40', 'an5.41', 'an5.42', 'an5.43', 'an5.44', 'an5.45', 'an5.46', 'an5.47', 'an5.48', 'an5.48', 'an5.49', 'an5.50', 'an5.51', 'an5.52', 'an5.53', 'an5.54', 'an5.55', 'an5.56', 'an5.57', 'an5.58', 'an5.59', 'an5.60', 'an5.61', 'an5.62', 'an5.63', 'an5.64', 'an5.65', 'an5.66', 'an5.67', 'an5.68', 'an5.69', 'an5.70', 'an5.71', 'an5.72', 'an5.73', 'an5.74', 'an5.75', 'an5.76', 'an5.77', 'an5.78', 'an5.79', 'an5.80', 'an5.81', 'an5.82', 'an5.83', 'an5.84', 'an5.85', 'an5.86', 'an5.87', 'an5.88', 'an5.89', 'an5.90', 'an5.91', 'an5.92', 'an5.93', 'an5.94', 'an5.95', 'an5.96', 'an5.97', 'an5.98', 'an5.99', 'an5.100', 'an5.101', 'an5.102', 'an5.103', 'an5.104', 'an5.105', 'an5.106', 'an5.107', 'an5.108', 'an5.109', 'an5.110', 'an5.111', 'an5.112', 'an5.113', 'an5.114', 'an5.115', 'an5.116', 'an5.117', 'an5.118', 'an5.119', 'an5.120', 'an5.121', 'an5.122', 'an5.123', 'an5.124', 'an5.125', 'an5.126', 'an5.127', 'an5.128', 'an5.129', 'an5.130', 'an5.131', 'an5.132', 'an5.133', 'an5.134', 'an5.135', 'an5.136', 'an5.137', 'an5.138', 'an5.139', 'an5.140', 'an5.141', 'an5.142', 'an5.143', 'an5.144', 'an5.145', 'an5.146', 'an5.147', 'an5.148', 'an5.149', 'an5.150', 'an5.151', 'an5.152', 'an5.153', 'an5.154', 'an5.155', 'an5.156', 'an5.157', 'an5.158', 'an5.159', 'an5.160', 'an5.161', 'an5.162', 'an5.163', 'an5.164', 'an5.165', 'an5.166', 'an5.167', 'an5.168', 'an5.169', 'an5.170', 'an5.171', 'an5.172', 'an5.173', 'an5.174', 'an5.175', 'an5.176', 'an5.177', 'an5.178', 'an5.179', 'an5.180', 'an5.181', 'an5.182', 'an5.183', 'an5.184', 'an5.185', 'an5.186', 'an5.187', 'an5.188', 'an5.189', 'an5.190', 'an5.191', 'an5.192', 'an5.193', 'an5.194', 'an5.195', 'an5.196', 'an5.197', 'an5.198', 'an5.199', 'an5.200', 'an5.201', 'an5.202', 'an5.203', 'an5.204', 'an5.205', 'an5.206', 'an5.207', 'an5.208', 'an5.209', 'an5.210', 'an5.211', 'an5.212', 'an5.213', 'an5.214', 'an5.215', 'an5.216', 'an5.217', 'an5.218', 'an5.219', 'an5.220', 'an5.221', 'an5.222', 'an5.223', 'an5.224', 'an5.225', 'an5.226', 'an5.227', 'an5.228', 'an5.229', 'an5.230', 'an5.231', 'an5.232', 'an5.233', 'an5.234', 'an5.235', 'an5.236', 'an5.237', 'an5.238', 'an5.239', 'an5.240', 'an5.241', 'an5.242', 'an5.243', 'an5.244', 'an5.245', 'an5.246', 'an5.247', 'an5.248', 'an5.249', 'an5.250', 'an5.251', 'an5.252', 'an5.253', 'an5.254', 'an5.255', 'an5.256', 'an5.257-263', 'an5.264', 'an5.265-271', 'an5.272', 'an5.273-285', 'an5.286', 'an5.287-292', 'an5.293', 'an5.294-302', 'an5.303', 'an5.304', 'an5.305', 'an5.306', 'an5.307', 'an5.308-1152', 'an6.1', 'an6.2', 'an6.3', 'an6.4', 'an6.5', 'an6.6', 'an6.7', 'an6.8', 'an6.9', 'an6.10', 'an6.11', 'an6.12', 'an6.13', 'an6.14', 'an6.15', 'an6.16', 'an6.17', 'an6.18', 'an6.19', 'an6.20', 'an6.21', 'an6.22', 'an6.23', 'an6.24', 'an6.25', 'an6.26', 'an6.27', 'an6.28', 'an6.29', 'an6.30', 'an6.31', 'an6.32', 'an6.33', 'an6.34', 'an6.35', 'an6.36', 'an6.37', 'an6.38', 'an6.39', 'an6.40', 'an6.41', 'an6.42', 'an6.43', 'an6.44', 'an6.45', 'an6.46', 'an6.47', 'an6.48', 'an6.49', 'an6.50', 'an6.51', 'an6.52', 'an6.53', 'an6.54', 'an6.55', 'an6.56', 'an6.57', 'an6.58', 'an6.59', 'an6.60', 'an6.61', 'an6.62', 'an6.63', 'an6.63', 'an6.64', 'an6.65', 'an6.66', 'an6.67', 'an6.68', 'an6.69', 'an6.70', 'an6.71', 'an6.72', 'an6.73', 'an6.74', 'an6.75', 'an6.76', 'an6.77', 'an6.78', 'an6.79', 'an6.80', 'an6.81', 'an6.82', 'an6.83', 'an6.84', 'an6.85', 'an6.86', 'an6.87', 'an6.88', 'an6.89', 'an6.90', 'an6.91', 'an6.92', 'an6.93', 'an6.94', 'an6.95', 'an6.96', 'an6.97', 'an6.98', 'an6.99', 'an6.100', 'an6.101', 'an6.102', 'an6.103', 'an6.104', 'an6.105', 'an6.106', 'an6.107', 'an6.108', 'an6.109', 'an6.110', 'an6.111', 'an6.112', 'an6.113', 'an6.114', 'an6.115', 'an6.116', 'an6.117', 'an6.118', 'an6.119', 'an6.120-139', 'an6.140', 'an6.141', 'an6.142', 'an6.143-169', 'an6.170-649', 'an7.1', 'an7.2', 'an7.3', 'an7.4', 'an7.5', 'an7.6', 'an7.7', 'an7.8', 'an7.9', 'an7.10', 'an7.11', 'an7.12', 'an7.13', 'an7.14', 'an7.15', 'an7.16', 'an7.17', 'an7.18', 'an7.19', 'an7.20', 'an7.21', 'an7.22', 'an7.23', 'an7.24', 'an7.25', 'an7.26', 'an7.27', 'an7.28', 'an7.29', 'an7.30', 'an7.31', 'an7.32', 'an7.33', 'an7.34', 'an7.35', 'an7.36', 'an7.37', 'an7.38', 'an7.39', 'an7.40', 'an7.41', 'an7.42', 'an7.43', 'an7.44', 'an7.45', 'an7.46', 'an7.47', 'an7.48', 'an7.49', 'an7.50', 'an7.51', 'an7.52', 'an7.53', 'an7.54', 'an7.55', 'an7.56', 'an7.57', 'an7.58', 'an7.59', 'an7.60', 'an7.61', 'an7.62', 'an7.63', 'an7.64', 'an7.65', 'an7.66', 'an7.67', 'an7.68', 'an7.69', 'an7.70', 'an7.71', 'an7.72', 'an7.73', 'an7.74', 'an7.75', 'an7.76', 'an7.77', 'an7.78', 'an7.79', 'an7.80', 'an7.81', 'an7.82', 'an7.83', 'an7.84', 'an7.85', 'an7.86', 'an7.87', 'an7.88', 'an7.89', 'an7.90', 'an7.91', 'an7.92', 'an7.93', 'an7.94', 'an7.95', 'an7.96-614', 'an7.615', 'an7.616', 'an7.617', 'an7.618-644', 'an7.645-1124', 'an8.1', 'an8.2', 'an8.3', 'an8.4', 'an8.5', 'an8.6', 'an8.7', 'an8.8', 'an8.9', 'an8.10', 'an8.11', 'an8.12', 'an8.13', 'an8.14', 'an8.15', 'an8.16', 'an8.17', 'an8.18', 'an8.19', 'an8.20', 'an8.21', 'an8.22', 'an8.23', 'an8.24', 'an8.25', 'an8.26', 'an8.27', 'an8.28', 'an8.29', 'an8.30', 'an8.31', 'an8.32', 'an8.33', 'an8.34', 'an8.35', 'an8.36', 'an8.37', 'an8.38', 'an8.39', 'an8.40', 'an8.41', 'an8.42', 'an8.43', 'an8.44', 'an8.45', 'an8.46', 'an8.47', 'an8.48', 'an8.49', 'an8.50', 'an8.51', 'an8.52', 'an8.53', 'an8.54', 'an8.55', 'an8.56', 'an8.57', 'an8.58', 'an8.59', 'an8.60', 'an8.61', 'an8.62', 'an8.63', 'an8.64', 'an8.65', 'an8.66', 'an8.67', 'an8.68', 'an8.69', 'an8.70', 'an8.71', 'an8.72', 'an8.73', 'an8.74', 'an8.75', 'an8.76', 'an8.77', 'an8.78', 'an8.79', 'an8.80', 'an8.81', 'an8.82', 'an8.83', 'an8.84', 'an8.85', 'an8.86', 'an8.87', 'an8.88', 'an8.89', 'an8.90', 'an8.91-117', 'an8.118', 'an8.119', 'an8.120', 'an8.121-147', 'an8.148-627', 'an9.1', 'an9.2', 'an9.3', 'an9.4', 'an9.5', 'an9.6', 'an9.7', 'an9.8', 'an9.9', 'an9.10', 'an9.11', 'an9.12', 'an9.13', 'an9.14', 'an9.15', 'an9.16', 'an9.17', 'an9.18', 'an9.19', 'an9.20', 'an9.21', 'an9.22', 'an9.23', 'an9.24', 'an9.25', 'an9.26', 'an9.27', 'an9.28', 'an9.29', 'an9.30', 'an9.31', 'an9.32', 'an9.33', 'an9.34', 'an9.35', 'an9.36', 'an9.37', 'an9.38', 'an9.39', 'an9.40', 'an9.41', 'an9.42', 'an9.43', 'an9.44', 'an9.45', 'an9.46', 'an9.47', 'an9.48', 'an9.49', 'an9.50', 'an9.51', 'an9.52', 'an9.53', 'an9.54', 'an9.55', 'an9.56', 'an9.57', 'an9.58', 'an9.59', 'an9.60', 'an9.61', 'an9.62', 'an9.63', 'an9.64', 'an9.65', 'an9.66', 'an9.67', 'an9.68', 'an9.69', 'an9.70', 'an9.71', 'an9.72', 'an9.73', 'an9.74-81', 'an9.82', 'an9.83', 'an9.84-91', 'an9.92', 'an9.93', 'an9.94', 'an9.95-112', 'an9.113-432', 'an10.1', 'an10.2', 'an10.3', 'an10.4', 'an10.5', 'an10.6', 'an10.7', 'an10.8', 'an10.9', 'an10.10', 'an10.11', 'an10.12', 'an10.13', 'an10.14', 'an10.15', 'an10.16', 'an10.17', 'an10.18', 'an10.19', 'an10.20', 'an10.21', 'an10.22', 'an10.23', 'an10.24', 'an10.25', 'an10.26', 'an10.27', 'an10.28', 'an10.29', 'an10.30', 'an10.31', 'an10.32', 'an10.33', 'an10.34', 'an10.35', 'an10.36', 'an10.37', 'an10.38', 'an10.39', 'an10.40', 'an10.41', 'an10.42', 'an10.43', 'an10.44', 'an10.45', 'an10.46', 'an10.47', 'an10.48', 'an10.49', 'an10.50', 'an10.51', 'an10.52', 'an10.53', 'an10.54', 'an10.55', 'an10.56', 'an10.57', 'an10.58', 'an10.59', 'an10.60', 'an10.61', 'an10.62', 'an10.63', 'an10.64', 'an10.65', 'an10.66', 'an10.67', 'an10.68', 'an10.69', 'an10.70', 'an10.71', 'an10.72', 'an10.73', 'an10.74', 'an10.75', 'an10.76', 'an10.77', 'an10.78', 'an10.79', 'an10.80', 'an10.81', 'an10.82', 'an10.83', 'an10.84', 'an10.85', 'an10.86', 'an10.87', 'an10.88', 'an10.89', 'an10.90', 'an10.91', 'an10.92', 'an10.93', 'an10.94', 'an10.95', 'an10.96', 'an10.97', 'an10.98', 'an10.99', 'an10.100', 'an10.101', 'an10.102', 'an10.103', 'an10.104', 'an10.105', 'an10.106', 'an10.107', 'an10.108', 'an10.109', 'an10.110', 'an10.111', 'an10.112', 'an10.113', 'an10.114', 'an10.115', 'an10.116', 'an10.117', 'an10.118', 'an10.119', 'an10.120', 'an10.121', 'an10.122', 'an10.123', 'an10.124', 'an10.125', 'an10.126', 'an10.127', 'an10.128', 'an10.129', 'an10.130', 'an10.131', 'an10.132', 'an10.133', 'an10.134', 'an10.135', 'an10.136', 'an10.137', 'an10.138', 'an10.139', 'an10.140', 'an10.141', 'an10.142', 'an10.143', 'an10.144', 'an10.145', 'an10.146', 'an10.147', 'an10.148', 'an10.149', 'an10.150', 'an10.151', 'an10.152', 'an10.153', 'an10.154', 'an10.155', 'an10.156-166', 'an10.167', 'an10.168', 'an10.169', 'an10.170', 'an10.171', 'an10.172', 'an10.173', 'an10.174', 'an10.175', 'an10.176', 'an10.177', 'an10.178', 'an10.179', 'an10.180', 'an10.181', 'an10.182', 'an10.183', 'an10.184', 'an10.185', 'an10.186', 'an10.187', 'an10.188', 'an10.189', 'an10.190', 'an10.191', 'an10.192', 'an10.193', 'an10.194', 'an10.195', 'an10.196', 'an10.197', 'an10.198', 'an10.199-210', 'an10.211', 'an10.212', 'an10.213', 'an10.214', 'an10.215', 'an10.216', 'an10.216', 'an10.217', 'an10.218', 'an10.219', 'an10.220', 'an10.221', 'an10.222', 'an10.223', 'an10.224', 'an10.225-228', 'an10.229-232', 'an10.233-236', 'an10.237', 'an10.238', 'an10.239', 'an10.240-266', 'an10.267-746', 'an11.1', 'an11.2', 'an11.3', 'an11.4', 'an11.5', 'an11.6', 'an11.7', 'an11.8', 'an11.9', 'an11.10', 'an11.11', 'an11.12', 'an11.13', 'an11.14', 'an11.15', 'an11.16', 'an11.17', 'an11.18', 'an11.19', 'an11.20', 'an11.21', 'an11.22-29', 'an11.30-69', 'an11.70-117', 'an11.118-165', 'an11.166-213', 'an11.214-261', 'an11.262-309', 'an11.310-357', 'an11.358-405', 'an11.406-453', 'an11.454-501', 'an11.502-981', 'an11.982', 'an11.983-991', 'an11.992-1151'];

let snranges = ["sn1.1", "sn1.2", "sn1.3", "sn1.4", "sn1.5", "sn1.6", "sn1.7", "sn1.8", "sn1.9", "sn1.10", "sn1.11", "sn1.12", "sn1.13", "sn1.14", "sn1.15", "sn1.16", "sn1.17", "sn1.18", "sn1.19", "sn1.20", "sn1.21", "sn1.22", "sn1.23", "sn1.24", "sn1.25", "sn1.26", "sn1.27", "sn1.28", "sn1.29", "sn1.30", "sn1.31", "sn1.32", "sn1.33", "sn1.34", "sn1.35", "sn1.36", "sn1.37", "sn1.38", "sn1.39", "sn1.40", "sn1.41", "sn1.42", "sn1.43", "sn1.44", "sn1.45", "sn1.46", "sn1.47", "sn1.48", "sn1.49", "sn1.50", "sn1.51", "sn1.52", "sn1.53", "sn1.54", "sn1.55", "sn1.56", "sn1.57", "sn1.58", "sn1.59", "sn1.60", "sn1.61", "sn1.62", "sn1.63", "sn1.64", "sn1.65", "sn1.66", "sn1.67", "sn1.68", "sn1.69", "sn1.70", "sn1.71", "sn1.72", "sn1.73", "sn1.74", "sn1.75", "sn1.76", "sn1.77", "sn1.78", "sn1.79", "sn1.80", "sn1.81", "sn2.1", "sn2.2", "sn2.3", "sn2.4", "sn2.5", "sn2.6", "sn2.7", "sn2.8", "sn2.9", "sn2.10", "sn2.11", "sn2.12", "sn2.13", "sn2.14", "sn2.15", "sn2.16", "sn2.17", "sn2.18", "sn2.19", "sn2.20", "sn2.21", "sn2.22", "sn2.23", "sn2.24", "sn2.25", "sn2.26", "sn2.27", "sn2.28", "sn2.29", "sn2.30", "sn3.1", "sn3.2", "sn3.3", "sn3.4", "sn3.5", "sn3.6", "sn3.7", "sn3.8", "sn3.9", "sn3.10", "sn3.11", "sn3.12", "sn3.13", "sn3.14", "sn3.15", "sn3.16", "sn3.17", "sn3.18", "sn3.19", "sn3.20", "sn3.21", "sn3.22", "sn3.23", "sn3.24", "sn3.25", "sn4.1", "sn4.2", "sn4.3", "sn4.4", "sn4.5", "sn4.6", "sn4.7", "sn4.8", "sn4.9", "sn4.10", "sn4.11", "sn4.12", "sn4.13", "sn4.14", "sn4.15", "sn4.16", "sn4.17", "sn4.18", "sn4.19", "sn4.20", "sn4.21", "sn4.22", "sn4.23", "sn4.24", "sn4.25", "sn5.1", "sn5.2", "sn5.3", "sn5.4", "sn5.5", "sn5.6", "sn5.7", "sn5.8", "sn5.9", "sn5.10", "sn6.1", "sn6.2", "sn6.3", "sn6.4", "sn6.5", "sn6.6", "sn6.7", "sn6.8", "sn6.9", "sn6.10", "sn6.11", "sn6.12", "sn6.13", "sn6.14", "sn6.15", "sn7.1", "sn7.2", "sn7.3", "sn7.4", "sn7.5", "sn7.6", "sn7.7", "sn7.8", "sn7.9", "sn7.10", "sn7.11", "sn7.12", "sn7.13", "sn7.14", "sn7.15", "sn7.16", "sn7.17", "sn7.18", "sn7.19", "sn7.20", "sn7.21", "sn7.22", "sn12.1", "sn12.2", "sn12.3", "sn12.4", "sn12.5", "sn12.6", "sn12.7", "sn12.8", "sn12.9", "sn12.10", "sn12.11", "sn12.12", "sn12.13", "sn12.14", "sn12.19", "sn12.23", "sn12.24", "sn12.32", "sn12.41", "sn12.61", "sn12.62", "sn12.63", "sn12.64", "sn12.65", "sn12.66", "sn12.67", "sn12.68", "sn12.69", "sn12.70", "sn12.82", "sn12.83-92", "sn13.1", "sn13.2", "sn13.3", "sn13.4", "sn13.5", "sn13.6", "sn13.7", "sn13.8", "sn13.9", "sn13.10", "sn13.11", "sn14.1", "sn14.2", "sn14.3", "sn14.4", "sn14.5", "sn14.6", "sn14.7", "sn14.8", "sn14.9", "sn14.10", "sn14.11", "sn14.12", "sn14.13", "sn14.14", "sn14.15", "sn14.16", "sn14.17", "sn14.18", "sn14.19", "sn14.20", "sn14.21", "sn14.22", "sn14.23", "sn14.24", "sn14.25", "sn14.26", "sn14.27", "sn14.28", "sn14.29", "sn14.30", "sn14.31", "sn14.32", "sn14.33", "sn14.34", "sn14.35", "sn14.36", "sn14.37", "sn14.38", "sn14.39", "sn15.1", "sn15.2", "sn15.3", "sn15.4", "sn15.5", "sn15.6", "sn15.7", "sn15.8", "sn15.9", "sn15.10", "sn15.11", "sn15.12", "sn15.13", "sn15.14", "sn15.15", "sn15.16", "sn15.17", "sn15.18", "sn15.19", "sn15.20", "sn16.1", "sn16.2", "sn16.3", "sn16.4", "sn16.5", "sn16.6", "sn16.7", "sn16.8", "sn16.9", "sn16.10", "sn16.11", "sn16.12", "sn16.13", "sn17.1", "sn17.2", "sn17.3", "sn17.4", "sn17.5", "sn17.6", "sn17.7", "sn17.8", "sn17.9", "sn17.10", "sn17.11", "sn17.12", "sn17.13-20", "sn17.21", "sn17.22", "sn17.23", "sn17.24", "sn17.25", "sn17.26", "sn17.27", "sn17.28", "sn17.29", "sn17.30", "sn17.31", "sn17.32", "sn17.33", "sn17.34", "sn17.35", "sn17.36", "sn17.37", "sn17.38-43", "sn18.1", "sn18.2", "sn18.3", "sn18.4", "sn18.5", "sn18.6", "sn18.7", "sn18.8", "sn18.9", "sn18.10", "sn18.11", "sn18.12-20", "sn18.21", "sn18.22", "sn19.1", "sn19.1", "sn19.2", "sn19.2", "sn19.3", "sn19.3", "sn19.4", "sn19.4", "sn19.5", "sn19.5", "sn19.6", "sn19.6", "sn19.7", "sn19.7", "sn19.8", "sn19.8", "sn19.9", "sn19.10", "sn19.11", "sn19.12", "sn19.13", "sn19.14", "sn19.15", "sn19.16", "sn19.17", "sn19.18", "sn19.19", "sn19.20", "sn19.21", "sn20.1", "sn20.2", "sn20.3", "sn20.4", "sn20.5", "sn20.6", "sn20.7", "sn20.8", "sn20.9", "sn20.10", "sn20.11", "sn20.12", "sn21.1", "sn21.2", "sn21.3", "sn21.4", "sn21.5", "sn21.6", "sn21.7", "sn21.8", "sn21.9", "sn21.10", "sn21.11", "sn21.12", "sn22.1", "sn22.2", "sn22.3", "sn22.4", "sn22.5", "sn22.6", "sn22.7", "sn22.8", "sn22.9", "sn22.10", "sn22.11", "sn22.12", "sn22.13", "sn22.14", "sn22.15", "sn22.59", "sn22.79", "sn22.84", "sn22.85", "sn22.87", "sn22.95", "sn22.102", "sn22.103", "sn22.104", "sn22.105", "sn22.106", "sn22.107", "sn22.108", "sn22.109", "sn22.110", "sn22.111", "sn22.112", "sn22.113", "sn22.114", "sn22.115", "sn22.117", "sn22.137", "sn22.138", "sn22.139", "sn22.140", "sn22.141", "sn22.142", "sn23.1", "sn23.2", "sn23.3", "sn23.4", "sn23.5", "sn23.6", "sn23.7", "sn23.8", "sn23.9", "sn23.10", "sn23.11", "sn23.12", "sn23.13", "sn23.14", "sn23.15", "sn23.16", "sn23.17", "sn23.18", "sn23.19", "sn23.20", "sn23.21", "sn23.22", "sn23.23-33", "sn23.34", "sn23.35-45", "sn23.46", "sn24.1", "sn24.2", "sn24.3", "sn24.4", "sn24.5", "sn24.6", "sn24.7", "sn24.8", "sn24.9", "sn24.10", "sn24.11", "sn24.12", "sn24.13", "sn24.14", "sn24.15", "sn24.16", "sn24.17", "sn24.18", "sn24.19", "sn24.20-35", "sn24.36", "sn24.37", "sn24.38", "sn24.39", "sn24.40", "sn24.41", "sn24.42", "sn24.43", "sn24.44", "sn24.45", "sn24.46-69", "sn24.70", "sn24.71", "sn24.72-95", "sn24.96", "sn25.1", "sn25.2", "sn25.3", "sn25.4", "sn25.5", "sn25.6", "sn25.7", "sn25.8", "sn25.9", "sn25.10", "sn26.1", "sn26.2", "sn26.3", "sn26.4", "sn26.5", "sn26.6", "sn26.7", "sn26.8", "sn26.9", "sn26.10", "sn27.1", "sn27.2", "sn27.3", "sn27.4", "sn27.5", "sn27.6", "sn27.7", "sn27.8", "sn27.9", "sn27.10", "sn28.1", "sn28.2", "sn28.3", "sn28.4", "sn28.5", "sn28.6", "sn28.7", "sn28.8", "sn28.9", "sn28.10", "sn29.1", "sn29.2", "sn29.3", "sn29.4", "sn29.5", "sn29.6", "sn29.7", "sn29.8", "sn29.9", "sn29.10", "sn29.11-20", "sn29.21-50", "sn30.1", "sn30.2", "sn30.3", "sn30.4-6", "sn30.7-16", "sn30.17-46", "sn31.1", "sn31.2", "sn31.3", "sn31.4-12", "sn31.13-22", "sn31.23-112", "sn32.1", "sn32.2", "sn32.3-12", "sn32.13-52", "sn32.53", "sn32.54", "sn32.55", "sn32.56", "sn32.57", "sn33.1", "sn33.2", "sn33.3", "sn33.4", "sn33.5", "sn33.6-10", "sn33.11-15", "sn33.16-20", "sn33.21-25", "sn33.26-30", "sn33.31-35", "sn33.36-40", "sn33.41-45", "sn33.46-50", "sn33.51-54", "sn33.55", "sn34.1", "sn34.2", "sn34.3", "sn34.4", "sn34.5", "sn34.6", "sn34.7", "sn34.8", "sn34.9", "sn34.10", "sn34.11", "sn34.12", "sn34.13", "sn34.14", "sn34.15", "sn34.16", "sn34.17", "sn34.18", "sn34.19", "sn34.20-27", "sn34.28-34", "sn34.35-40", "sn34.41-45", "sn34.46-49", "sn34.50-52", "sn34.53-54", "sn34.55", "sn35.1", "sn35.2", "sn35.3", "sn35.4", "sn35.5", "sn35.6", "sn35.7", "sn35.8", "sn35.9", "sn35.10", "sn35.11", "sn35.12", "sn35.13", "sn35.14", "sn35.15", "sn35.16", "sn35.17", "sn35.18", "sn35.19", "sn35.20", "sn35.21", "sn35.22", "sn35.23", "sn35.24", "sn35.25", "sn35.26", "sn35.27", "sn35.28", "sn35.29", "sn35.30", "sn35.31", "sn35.32", "sn35.33-42", "sn35.43-51", "sn35.52", "sn35.53", "sn35.54", "sn35.55", "sn35.56", "sn35.57", "sn35.58", "sn35.84", "sn35.95", "sn35.104", "sn35.116", "sn35.121", "sn35.130", "sn35.132", "sn35.228", "sn35.229", "sn35.238", "sn35.239", "sn35.240", "sn35.241", "sn35.242", "sn35.243", "sn35.244", "sn35.245", "sn35.246", "sn35.247", "sn35.248", "sn36.19", "sn37.1", "sn37.2", "sn38.1", "sn38.2", "sn38.3", "sn38.4", "sn38.5", "sn38.6", "sn38.7", "sn38.8", "sn38.9", "sn38.10", "sn38.11", "sn38.12", "sn38.13", "sn38.14", "sn38.15", "sn38.16", "sn39.1-15", "sn39.16", "sn40.1", "sn40.2", "sn40.3", "sn40.4", "sn40.5", "sn40.6", "sn40.7", "sn40.8", "sn40.9", "sn40.10", "sn40.11", "sn41.1", "sn41.2", "sn41.3", "sn41.4", "sn41.5", "sn41.6", "sn41.7", "sn41.8", "sn41.9", "sn41.10", "sn42.1", "sn42.2", "sn42.3", "sn42.4", "sn42.5", "sn42.6", "sn42.7", "sn42.8", "sn42.9", "sn42.10", "sn42.11", "sn42.12", "sn42.13", "sn43.1", "sn43.2", "sn43.3", "sn43.4", "sn43.5", "sn43.6", "sn43.7", "sn43.8", "sn43.9", "sn43.10", "sn43.11", "sn43.12", "sn43.13", "sn43.14-43", "sn43.44", "sn44.1", "sn44.2", "sn44.3", "sn44.4", "sn44.5", "sn44.6", "sn44.7", "sn44.8", "sn44.9", "sn44.10", "sn44.11", "sn45.8", "sn45.28", "sn45.50-54", "sn45.55", "sn45.160", "sn46.1", "sn46.2", "sn46.3", "sn46.4", "sn46.5", "sn46.51", "sn46.52", "sn46.53", "sn46.54", "sn46.55", "sn46.56", "sn47.8", "sn47.12", "sn47.19", "sn47.20", "sn47.42", "sn48.51", "sn49.1-12", "sn49.13-22", "sn49.23-34", "sn49.35-44", "sn49.45-54", "sn50.1-12", "sn50.13-22", "sn50.23-34", "sn50.35-44", "sn50.45-54", "sn50.55-66", "sn50.67-76", "sn50.77-88", "sn50.89-98", "sn51.10", "sn51.20", "sn53.1-12", "sn53.13-22", "sn53.23-34", "sn53.35-44", "sn53.45-54", "sn54.1", "sn54.1", "sn54.2", "sn54.3", "sn54.4", "sn54.5", "sn54.6", "sn54.7", "sn54.8", "sn54.9", "sn54.10", "sn54.11", "sn54.12", "sn54.13", "sn54.14", "sn54.15", "sn54.16", "sn54.17", "sn54.18", "sn54.19", "sn54.20", "sn55.12", "sn56.11"];


let knranges = ['snp1.5', 'snp3.2', 'thag1.1', 'thag1.2', 'thag1.3', 'thag1.4', 'thag1.5', 'thag1.6', 'thag1.7', 'thag1.8', 'thag1.9', 'thag1.10', 'thag1.11', 'thag1.12', 'thag1.13', 'thag1.14', 'thag1.15', 'thag1.16', 'thag1.17', 'thag1.18', 'thag1.19', 'thag1.20', 'thag1.21', 'thag1.22', 'thag1.23', 'thag1.24', 'thag1.25', 'thag1.26', 'thag1.27', 'thag1.28', 'thag1.29', 'thag1.30', 'thag1.31', 'thag1.32', 'thag1.33', 'thag1.34', 'thag1.35', 'thag1.36', 'thag1.37', 'thag1.38', 'thag1.39', 'thag1.40', 'thag1.41', 'thag1.42', 'thag1.43', 'thag1.44', 'thag1.45', 'thag1.46', 'thag1.47', 'thag1.48', 'thag1.49', 'thag1.50', 'thag1.51', 'thag1.52', 'thag1.53', 'thag1.54', 'thag1.55', 'thag1.56', 'thag1.57', 'thag1.58', 'thag1.59', 'thag1.60', 'thag1.61', 'thag1.62', 'thag1.63', 'thag1.64', 'thag1.65', 'thag1.66', 'thag1.67', 'thag1.68', 'thag1.69', 'thag1.70', 'thag1.71', 'thag1.72', 'thag1.73', 'thag1.74', 'thag1.75', 'thag1.76', 'thag1.77', 'thag1.78', 'thag1.79', 'thag1.80', 'thag1.81', 'thag1.82', 'thag1.83', 'thag1.84', 'thag1.85', 'thag1.86', 'thag1.87', 'thag1.88', 'thag1.89', 'thag1.90', 'thag1.91', 'thag1.92', 'thag1.93', 'thag1.94', 'thag1.95', 'thag1.96', 'thag1.97', 'thag1.98', 'thag1.99', 'thag1.100', 'thag1.101', 'thag1.102', 'thag1.103', 'thag1.104', 'thag1.105', 'thag1.106', 'thag1.107', 'thag1.108', 'thag1.109', 'thag1.110', 'thag1.111', 'thag1.112', 'thag1.113', 'thag1.114', 'thag1.115', 'thag1.116', 'thag1.117', 'thag1.118', 'thag1.119', 'thag1.120', 'thag2.1', 'thag2.2', 'thag2.3', 'thag2.4', 'thag2.5', 'thag2.6', 'thag2.7', 'thag2.8', 'thag2.9', 'thag2.10', 'thag2.11', 'thag2.12', 'thag2.13', 'thag2.14', 'thag2.15', 'thag2.16', 'thag2.17', 'thag2.18', 'thag2.19', 'thag2.20', 'thag2.21', 'thag2.22', 'thag2.23', 'thag2.24', 'thag2.25', 'thag2.26', 'thag2.27', 'thag2.28', 'thag2.29', 'thag2.30', 'thag2.31', 'thag2.32', 'thag2.33', 'thag2.34', 'thag2.35', 'thag2.36', 'thag2.37', 'thag2.38', 'thag2.39', 'thag2.40', 'thag2.41', 'thag2.42', 'thag2.43', 'thag2.44', 'thag2.45', 'thag2.46', 'thag2.47', 'thag2.48', 'thag2.49', 'thag3.1', 'thag3.2', 'thag3.3', 'thag3.4', 'thag3.5', 'thag3.6', 'thag3.7', 'thag3.8', 'thag3.9', 'thag3.10', 'thag3.11', 'thag3.12', 'thag3.13', 'thag3.14', 'thag3.15', 'thag3.16', 'thag4.1', 'thag4.2', 'thag4.3', 'thag4.4', 'thag4.5', 'thag4.6', 'thag4.7', 'thag4.8', 'thag4.9', 'thag4.10', 'thag4.11', 'thag4.12', 'thag5.1', 'thag5.2', 'thag5.3', 'thag5.4', 'thag5.5', 'thag5.6', 'thag5.7', 'thag5.8', 'thag5.9', 'thag5.10', 'thag5.11', 'thag5.12', 'thag6.1', 'thag6.2', 'thag6.3', 'thag6.4', 'thag6.5', 'thag6.6', 'thag6.7', 'thag6.8', 'thag6.9', 'thag6.10', 'thag6.11', 'thag6.12', 'thag6.13', 'thag6.14', 'thig1.1', 'thig1.2', 'thig1.3', 'thig1.4', 'thig1.5', 'thig1.6', 'thig1.7', 'thig1.8', 'thig1.9', 'thig1.10', 'thig1.11', 'thig1.12', 'thig1.13', 'thig1.14', 'thig1.15', 'thig1.16', 'thig1.17', 'thig1.18', 'ud3.2'];

var rustrnpath = `/assets/texts/${texttype}/${slugReady}_translation-${pathLang}-${translator}.json`;

var rootpath = `${Sccopy}/sc-data/sc_bilara_data/root/pli/ms/${texttype}/${slugReady}_root-pli-ms.json`;

var varpath = `${Sccopy}/sc-data/sc_bilara_data/variant/pli/ms/${texttype}/${slugReady}_variant-pli-ms.json`;


var htmlpath = `${Sccopy}/sc-data/sc_bilara_data/html/pli/ms/${texttype}/${slugReady}_html.json`;

const ruUrl  = window.location.href;

const mlUrl = ruUrl.replace("/r/", "/ml/");
 let scLink = `<p class="sc-link"><a target="" href="${mlUrl}">R+E</a>&nbsp;`;
 //<a class='ruLink' href='' onclick=openRu('${slug}') data-slug='${slug}'>tst</a>&nbsp;
const currentURL = window.location.href;
const anchorURL = new URL(currentURL).hash; // Убираем символ "#"



// let ifRus = `<a target="" href="${mlUrl}">R+E</a>&nbsp;`;
 
if (slug.includes("mn"))  {
 var trnpath = rustrnpath; 
 let language = "pli-rus";
  console.log(trnpath);
// scLink += ifRus; 
} else if (anranges.indexOf(slug) !== -1) { 
  let language = "pli-rus";
  var trnpath = rustrnpath; 
  console.log(trnpath);
 // scLink += ifRus; 
}  else if (snranges.indexOf(slug) !== -1 || /^sn([1-4]|6|13|1[5-6]|2[0-1])\./.test(slug)) {
  var trnpath = rustrnpath; 
  console.log(trnpath);
//  scLink += ifRus; 
} else if (slug.includes("dn")) { 
  var trnpath = rustrnpath; 
  console.log(trnpath);
//  scLink += ifRus; 
} else if (knranges.indexOf(slug) !== -1) { 
  var trnpath = rustrnpath; 
 // scLink += ifRus; 
  console.log(trnpath);
} else if (slug.match(/ja/)) {
  let language = "pli";
    var trnpath = `${Sccopy}/sc-data/sc_bilara_data/root/pli/ms/${texttype}/${slugReady}_root-pli-ms.json`;
    //console.log('ja case ', rootpath, trnpath, htmlpath);
} else if ( texttype === "sutta" ) {
  let translator = "sujato";
  const pathLang = "en";
  // console.log(`${Sccopy}/sc-data/sc_bilara_data/translation/${pathLang}/${translator}/${texttype}/${slugReady}_translation-${pathLang}-${translator}.json`);
  var trnpath = `${Sccopy}/sc-data/sc_bilara_data/translation/${pathLang}/${translator}/${texttype}/${slugReady}_translation-${pathLang}-${translator}.json`;
} else if (slug.match(/bu-pm|bi-pm/)) {
    //let translator = "thanissaro+o";
    let translator = "o";
    var rootpath = `/assets/texts/${texttype}/${slug}_root-pli-ms.json`;
    var trnpath = `/assets/texts/${texttype}/${slug}_translation-${pathLang}-${translator}.json`;
    var htmlpath = `/assets/texts/${texttype}/${slug}_html.json`;
    console.log(rootpath, trnpath, htmlpath);
} else if ( texttype === "vinaya" ) {
  let translator = "brahmali";
  
  const pathLang = "en";
  console.log(`${Sccopy}/sc-data/sc_bilara_data/translation/${pathLang}/${translator}/${texttype}/${slugReady}_translation-${pathLang}-${translator}.json`);
  var trnpath = `${Sccopy}/sc-data/sc_bilara_data/translation/${pathLang}/${translator}/${texttype}/${slugReady}_translation-${pathLang}-${translator}.json`;
} 

  const rootResponse = fetch(rootpath).then(response => response.json());
  const varResponse = fetch(rootpath).then(response => response.json());
	

  const translationResponse = fetch(trnpath).then(response => response.json());
  const htmlResponse = fetch(htmlpath).then(response => response.json());

 
  Promise.all([rootResponse, varResponse, translationResponse, htmlResponse]).then(responses => {
    const [paliData, varData, transData, htmlData] = responses;
	 console.log('varData:', varData); // varData может быть null

    Object.keys(htmlData).forEach(segment => {
      if (transData[segment] === undefined) {
        transData[segment] = "";
      }
      let [openHtml, closeHtml] = htmlData[segment].split(/{}/);
      /* openHtml = openHtml.replace(/^<span class='verse-line'>/, "<br><span class='verse-line'>"); inputscript-IASTPali 
      Roman (IAST)     	IAST
Roman (IAST: Pāḷi)     	IASTPali
Roman (IPA)            	IPA
Roman (ISO 15919)      	ISO
Roman (ISO 15919: Pāḷi)	ISOPali */
// ISOPali ISO IASTPali IAST

let startIndex = segment.indexOf(':') + 1;
let anchor = segment.substring(startIndex);

if (slug.includes('-') && (slug.includes('an') || slug.includes('sn') || slug.includes('dhp'))) {
anchor = segment;
}

// Получите полный URL с якорем

var fullUrlWithAnchor = window.location.href.split('#')[0] + '#' + anchor;

let params = new URLSearchParams(document.location.search);
  let finder = params.get("s");
 //  finder = finder.replace(/\\b/g, '');
//  finder = finder.replace(/%08/g, '\\b');
 // console.log(finder);
   // let finder = decodeURIComponent(params.get("s"));

if (finder && finder.trim() !== "") {
    let regex = new RegExp(finder, 'gi'); // 'gi' - игнорировать регистр
    paliData[segment] = paliData[segment].replace(regex, match => `<b class="match finder">${match}</b>`);
    transData[segment] = transData[segment].replace(regex, match => `<b class="match finder">${match}</b>`);
    
}


if (paliData[segment] !== undefined && varData[segment] !== undefined && transData[segment] !== undefined) {
html += `${openHtml}
<span id="${anchor}">
<span class="pli-lang inputscript-ISOPali" lang="pi">${paliData[segment].trim()}<a style="cursor: pointer;" class="text-decoration-none" onclick="copyToClipboard('${fullUrlWithAnchor}')">&nbsp;</a><br>${varData[segment].trim()}</span>
<span class="rus-lang" lang="ru">${transData[segment]}</span>
</span>
${closeHtml}\n\n`;
	
}
else if (paliData[segment] !== undefined && varData[segment] === undefined && transData[segment] !== undefined) {
html += `${openHtml}
<span id="${anchor}">
<span class="pli-lang inputscript-ISOPali" lang="pi">${paliData[segment].trim()}<a style="cursor: pointer;" class="text-decoration-none" onclick="copyToClipboard('${fullUrlWithAnchor}')">&nbsp;</a></span>
<span class="rus-lang" lang="ru">${transData[segment]}</span>
</span>
${closeHtml}\n\n`;

} else if (paliData[segment] !== undefined) {
  html += openHtml + '<span id="' + anchor + '"><span class="pli-lang inputscript-ISOPali" lang="pi">' + paliData[segment] + '</span></span>' + closeHtml + '\n\n';
} else if (transData[segment] !== undefined) {
  html += openHtml + '<span id="' + anchor + '"><span class="rus-lang" lang="ru">' + transData[segment] + '</span></span>' + closeHtml + '\n\n';
}
    });

//console.log('before ' + translator) ;

if (translator === "sv") {
  translatorforuser = 'SV theravada.ru';
} else if ((translator === "" && texttype === "sutta" ) || (translator === "sujato" )) {
  translatorforuser = 'Bhikkhu Sujato';
} else if ((translator === "" && texttype === "vinaya") || (translator === "brahmali" ))  {
  translatorforuser = 'Bhikkhu Brahmali';
} else if (translator === "syrkin" ) {
  translatorforuser = 'А.Я. Сыркин';
} else if (translator === "syrkin+o" ) {
  translatorforuser = 'А.Я. Сыркин, ред. о';
} else {
	translatorforuser = translator ;
	
}

//const translatorCapitalized = translator.charAt(0).toUpperCase() + translator.slice(1);

     const translatorByline = `<div class="byline">
     <p>
    <span class="rus-lang" lang="ru">
     Перевод: ${translatorforuser}
    </span>
     </p>
     </div>`;
  
  const ruUrl  = window.location.href;

const enUrl = ruUrl.replace("/r/", "/read/");

scLink += `<a href="${enUrl}">En</a>&nbsp;`;
 
  
//dpr
if (texttype !== "vinaya") {
function getTextUrl(slug) {
  let nikaya = slug.match(/[a-zA-Z]+/)[0]; // Получаем название никаи из строки
  let textnum;

  if (slug.includes(".")) {
    let match = slug.match(/([a-zA-Z]+)(\d+)\.(\d+)/);
    if (match) {
      let [, nikaya, subdivision, textnum] = match;
      let textUrl = findTextUrl(nikaya, parseInt(subdivision), parseInt(textnum));
      if (textUrl) {
        return textUrl;
      }
    }
  } else {
    textnum = parseInt(slug.match(/[a-zA-Z](\d+)/)[1]); // Получаем цифры после букв
    let textUrl = findTextUrl(nikaya, null, textnum);
    if (textUrl) {
      return textUrl;
    }
  }
  
  return "Запись не найдена";
}

function findTextUrl(nikaya, subdivision, textnum) {
  if (subdivision !== null) {
    if (digitalPaliReader[nikaya].available[subdivision]) {
      let item = digitalPaliReader[nikaya].available[subdivision].find(item => {
        if (Array.isArray(item)) {
          if (item.length === 3) {
            return textnum >= item[0] && textnum <= item[1];
          } else if (item.length === 2) {
            return textnum === item[0];
          }
        }
        return false;
      });
      
      if (item) {
        return digitalPaliReader.constants.rootUrl + item[item.length - 1];
      }
    }
  } else {
    let item = digitalPaliReader[nikaya].available.find(item => Array.isArray(item) ? item[0] === textnum : item === textnum);
    if (item) {
      return digitalPaliReader.constants.rootUrl + item[1];
    }
  }
  
  return null;
}

let textUrl = getTextUrl(slug);
console.log("Ссылка на", slug + ":", textUrl);
if (textUrl) {
scLink += `<a target="" href="${textUrl}">DPR</a>&nbsp;`;
}

}
//dpr end
if ((translator === 'sujato') || (translator === 'brahmali')) {
  scLink += `<a target="" href="https://suttacentral.net/${slug}/en/${translator}">SC.net</a>&nbsp;`;  
} else {
  scLink += `<a target="" href="https://suttacentral.net/${slug}">SC.net</a>&nbsp;`;
}

      $.ajax({
      url: "/read/extralinks.php?fromjs=" +slug
    }).done(function(data) {
      const linksArray = data.split(",");
  
   //   scLink += `<a target="" href="https://suttacentral.net/${slug}">SC.net</a>&nbsp;`; 

//<a href="/legacy.suttacentral.net/read/pi/${slug}.html">legacy.SC</a>&nbsp; <a target="" href="https://voice.suttacentral.net/scv/index.html?#/sutta?search=${slug}">Voice.SC</a>
      if (linksArray[0].length >= 4) {
        scLink += linksArray[0];
            console.log("extralinks " + linksArray[0]);
      } 
      scLink += "</p>"; 


const origUrl = window.location.href;
let rvUrl = origUrl.replace("/r/", "/read/");
rvUrl = rvUrl.replace("/ml/", "");
rvUrl = rvUrl.replace("/read/", "/rev/");

const warning = "<p class='warning'><strong>Внимание!</strong><br>Переводы выполнены не Благословенным.<br>Сверяйтесь с Пали в 4 основных никаях.<a style='cursor: pointer;' class='text-decoration-none' target='' href='" + rvUrl + "'>&nbsp;</a></p>";

suttaArea.innerHTML =  scLink + warning + translatorByline + html + translatorByline + warning + scLink;

suttaArea.innerHTML =  scLink + warning + translatorByline + html + translatorByline + warning + scLink ;  

const pageTitleElement = document.querySelector("h1");
let pageTitleText = pageTitleElement.textContent;
pageTitle = pageTitleText.replace(/[0-9.]/g, '');

slug = slug.replace(/pli-tv-|vb-/g, '');
document.title = `${slug} ${pageTitle}`;
    
var metaDescription = document.createElement('meta');
metaDescription.name = 'description';
metaDescription.content = document.title;
document.head.appendChild(metaDescription);

var ogDescriptionMeta = document.createElement('meta');
ogDescriptionMeta.property = 'og:description';
ogDescriptionMeta.content = document.title;
document.head.appendChild(ogDescriptionMeta);


      toggleThePali();
      
      $.ajax({
      url: "/read/api.php?fromjs=" +texttype +"/" +slugReady +"&type=A"
    }).done(function(data) {
      const nextArray = data.split(" ");
      let nextSlug = nextArray[0];
let nextSlugPrint = nextSlug.replace(/pli-tv-|b[ui]-vb-/g, "");

   //   let nextName = nextArray[1];
let nextName = nextArray.slice(1).join(" ");
nextName = nextName.replace(/[0-9.]/g, '');

      if (nextName === undefined) {
      var nextPrint = nextSlugPrint;
      } else {
     var nextPrint = nextSlugPrint +' ' +nextName;
     }
     console.log(nextPrint);
         next.innerHTML = nextSlug
        ? `<a href="?q=${nextSlug}">${nextPrint}<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="body_1" width="15" height="11">

      <g transform="matrix(0.021484375 0 0 0.021484375 2 -0)">
        <g>
              <path d="M202.1 450C 196.03278 449.9987 190.56381 446.34256 188.24348 440.73654C 185.92316 435.13055 187.20845 428.67883 191.5 424.39L191.5 424.39L365.79 250.1L191.5 75.81C 185.81535 69.92433 185.89662 60.568687 191.68266 54.782654C 197.46869 48.996624 206.82434 48.91536 212.71 54.6L212.71 54.6L397.61 239.5C 403.4657 245.3575 403.4657 254.8525 397.61 260.71L397.61 260.71L212.70999 445.61C 209.89557 448.4226 206.07895 450.0018 202.1 450z" stroke="none" fill="#8f8f8f" fill-rule="nonzero" />
        </g>
      </g>
      </svg></a>`
        : "";
        next2.innerHTML = next.innerHTML;
    }
    );
  
  $.ajax({
      url: "/read/api.php?fromjs=" +texttype +"/" +slugReady +"&type=B"
    }).done(function(data) {
      const prevArray = data.split(" ");
      let prevSlug = prevArray[0];
      let prevSlugPrint = prevSlug.replace(/pli-tv-|b[ui]-vb-/g, "");

//      let prevName = prevArray[1];
let prevName = prevArray.slice(1).join(" ");
prevName = prevName.replace(/[0-9.]/g, '');

        if (prevName === undefined) {
    var prevPrint = prevSlugPrint;
      } else {
        var prevPrint = prevSlugPrint +' ' +prevName;
     }
      previous.innerHTML = prevSlug
        ? `<a href="?q=${prevSlug}"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="body_1" width="15" height="11">

      <g transform="matrix(0.021484375 0 0 0.021484375 2 -0)">
        <g>
              <path d="M353 450C 349.02106 450.0018 345.20444 448.4226 342.39 445.61L342.39 445.61L157.5 260.71C 151.64429 254.8525 151.64429 245.3575 157.5 239.5L157.5 239.5L342.39 54.6C 346.1788 50.809414 351.70206 49.328068 356.8792 50.713974C 362.05634 52.099876 366.10086 56.14248 367.4892 61.318974C 368.87753 66.49547 367.3988 72.01941 363.61002 75.81L363.61002 75.81L189.32 250.1L363.61 424.39C 367.90283 428.6801 369.18747 435.13425 366.8646 440.74118C 364.5417 446.34808 359.06903 450.00275 353 450z" stroke="none" fill="#8f8f8f" fill-rule="nonzero" />
        </g>
      </g>
      </svg>${prevPrint}</a>`
        : ""; 
        previous2.innerHTML = previous.innerHTML;
      }
      );

    }
    );
     
    })
.catch(error => {
  console.log('error:not found');

  // Отправка запроса по адресу http://localhost:8080/ru/?q= с использованием значения slug
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "/ru/?q=" + encodeURIComponent(slug), true);
  xhr.send();

  // Обработка ответа
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4) {
      if (xhr.status == 200) {
        // Обработка успешного ответа
        console.log(xhr.responseText);

        window.location.href = "/ru/?q=" + encodeURIComponent(slug);

      } else {
        // Обработка ошибки
        console.log('Error sending request to /ru/?q=');
      }
    }
  };

  // Обновление сообщения об ошибке на странице
  
  suttaArea.innerHTML = `<p>Идёт Поиск "${decodeURIComponent(slug)}". Пожалуйста, Ожидайте.</p>
    
                  <div class="spinner-border" role="status">
                <span class="visually-hidden">Загрузка...</span>
                  </div>
  <p>  Подсказка: <br>
    С главной страницы доступно больше настроек поиска.
<br></p>`;
return false;
});

    }

    );
	
// в конец функции можно добавить скролл

}

// initialize the whole app
if (document.location.search) {
  let params = new URLSearchParams(document.location.search);
  let slug = params.get("q");
  let lang = params.get("lang");

  citation.value = slug;

  buildSutta(slug);
  
  if (lang) {
    language = lang;
    console.log("in the initializing " + lang);
    setLanguage(lang);
  } else if  (localStorage.paliToggleRu) {
    	language = localStorage.paliToggleRu; 
		  console.log('read from ls ' + language);
setLanguage(language);
  } 
} else {
  suttaArea.innerHTML = `<div class="instructions">
<p>Для перехода тексты должны быть указаны с номерами. Пример: <span class="abbr">sn35.28</span> <span class="abbr">an1.1-10</span> <span class="abbr">bu-as1-7</span> или <span class="abbr">bi-pj1</span>.<br>
 Доступны dn, mn, sn, an, некоторые книги kn, обе патимоккхи и виная вибханги.<br>
  </p>
  <div class="lists">

  <div class="suttas">
  <a href="/ru/read.php"> <h2>Основные Сутты</h2></a> 
  <ul>
     <li><span class="abbr">dn</span> <a href="/ru/assets/texts/dn.php"> Dīgha-nikāya</a></li></li>
     <li><span class="abbr">mn</span> <a href="/ru/assets/texts/mn.php"> Majjhima-nikāya</a></li></li>
      <li><span class="abbr">sn</span> <a href="/ru/assets/texts/sn.php"> Saṁyutta-nikāya</a></li>
      <li><span class="abbr">an</span> <a href="/ru/assets/texts/an.php"> Aṅguttara-nikāya</a></li>
      <li><span class="abbr">snp</span> Sutta-nipāta</li>
  </ul>
  </div><div>
 <!-- <h2>Виная</h2> -->
  <div class="vinaya">
  <div>
  <h3>Бхиккху Виная</h3>
<ul>
<li><span class="abbr">bu-pm</span> <a href="/ru/assets/texts/pm.php"> Bhikkhupātimokkha</a></li>
<li><span class="abbr">bu-pj</span> <a href="/r/?q=bu-pm#8.0"> Pārājikā</a></li></li>
<li><span class="abbr">bu-ss</span> <a href="/r/?q=bu-pm#14.0"> Saṅghādisesā</a></li></li>
<li><span class="abbr">bu-ay</span> <a href="/r/?q=bu-pm#29.0"> Aniyatā</a></li>
<li><span class="abbr">bu-np</span> <a href="/r/?q=bu-pm#33.0"> Nissaggiyā-pācittiyā</a></li>
<li><span class="abbr">bu-pc</span> <a href="/r/?q=bu-pm#65.0"> Pācittiyā</a></li>
<li><span class="abbr">bu-pd</span> <a href="/r/?q=bu-pm#159.0"> Pāṭidesanīyā</a></li></li>
<li><span class="abbr">bu-sk</span> <a href="/r/?q=bu-pm#165.0"> Sekhiyā</a></li></li>
<li><span class="abbr">bu-as</span> <a href="/r/?q=bu-pm#245.0"> Adhikarana-samatha</a></li></li>
</ul>
</div><div>
<h3>Бхиккхуни Виная</h3>
<ul>
<li><span class="abbr">bi-pm</span> <a href="/ru/assets/texts/bipm.php"> Bhikkhunīpātimokkha</a></li>
<li><span class="abbr">bi-pj</span> Pārājikā</li>
<li><span class="abbr">bi-ss</span> Saṅghādisesā</li>
<li><span class="abbr">bi-np</span> Nissaggiyā-pācittiyā</li>
<li><span class="abbr">bi-pc</span> Pācittiyā</li>
<li><span class="abbr">bi-pd</span> Pāṭidesanīyā</li>
<li><span class="abbr">bi-sk</span> Sekhiyā</li>
<li><span class="abbr">bi-as</span> Adhikarana-samatha</li>
</ul>
</div>
<ul>
<li><span class="abbr">kd</span> Khandhakas</li>
<li><span class="abbr">pvr</span> Parivāra</li>
</ul>
</div>
  </div></div>
  <h2>Другие тексты</h2>
  <ul>
      <li><span class="abbr">ud</span> Udāna</li>
      <li><span class="abbr">iti</span> Itivuttaka (1–112)</li>
      <li><span class="abbr">dhp</span> Dhammapada</li>
      <li><span class="abbr">snp</span> Sutta-nipāta</li>
      <li><span class="abbr">thag</span> Theragāthā</li>
      <li><span class="abbr">thig</span> Therīgāthā</li>
	  <li><span class="abbr">kp</span> Khuddakapāṭha</li>
  </ul>
  </div><div>
</div>
`;
}

function setLanguage(language) {
  if (language === "pli-rus") {
    showPaliEnglish();
  } else if (language === "pli") {
    showPali();
  } else if (language === "rus") {
    showEnglish();
  }
}

function showPaliEnglish() {
  console.log("showing pali eng");
  suttaArea.classList.remove("hide-pali");
  suttaArea.classList.remove("hide-english");
  suttaArea.classList.remove("hide-russian");
}
function showEnglish() {
  console.log("showing eng");
  suttaArea.classList.add("hide-pali");
  suttaArea.classList.remove("hide-english");
  suttaArea.classList.remove("hide-russian");
}
function showPali() {
  console.log("showing pali");
  suttaArea.classList.remove("hide-pali");
  suttaArea.classList.add("hide-english");
  suttaArea.classList.add("hide-russian");
}

function toggleThePali() {
  const languageButton = document.getElementById("language-button");

 
	 // initial state
 if (!localStorage.paliToggleRu) {
    localStorage.paliToggleRu = "pli-rus";
  }   

  languageButton.addEventListener("click", () => {
    if (language === "pli-rus") {
     showPali();
      language = "pli";
      localStorage.paliToggleRu = "pli";
    } else if (language === "rus") {
      showPaliEnglish();
      language = "pli-rus";    
      localStorage.paliToggleRu = "pli-rus";
    } else if (language === "pli") {
	  showEnglish();
      language = "rus";
      localStorage.paliToggleRu = "rus";  
    }
  });
}

function parseSlug(slug) {
if (
  slug === 'bu-as' ||
  slug === 'bu-vb-as1-7' ||
  slug === 'pli-tv-bu-vb-as1-7' ||
  slug === 'bi-as' ||
  slug === 'bi-vb-as1-7' ||
  slug === 'pli-tv-bi-vb-as1-7'
) {
  const slugParts = slug.match(/^([a-z]+)-([a-z]+)-([a-z]+)-([a-z]+)-([a-z]+)*(\d*)/);
  console.log('as case');
  const fixforbivb = slug.replace(/(\d+)-(\d+)/g, '');
  const bookWithoutNumber = fixforbivb.replace(/(\d+)/g, '');
  const fixforbivb2 = slug.replace(/-([a-z]+)\d+/g, '');
  const bookWithoutNumberAndRule = fixforbivb2.replace(/-\d+$/g, '');
  const firstNum = slugParts[6];
  
  return `${bookWithoutNumberAndRule}/${bookWithoutNumber}1-7`;
} else if ( slug.match(/^([a-z]+)-([a-z]+)-([a-z]+)-([a-z]+)-([a-z]+)*(\d*)/)) {
    const slugParts = slug.match(/^([a-z]+)-([a-z]+)-([a-z]+)-([a-z]+)-([a-z]+)*(\d*)/);
  const fixforbivb = slug.replace(/(\d+)-(\d+)/g, '');
  const bookWithoutNumber = fixforbivb.replace(/(\d+)/g, '');
  const fixforbivb2 = slug.replace(/-([a-z]+)\d+/g, '');
  const bookWithoutNumberAndRule = fixforbivb2.replace(/-\d+$/g, '');
  const firstNum = slugParts[6];
  return `${bookWithoutNumberAndRule}/${bookWithoutNumber}/${slug}`;
}
else if  (slug.match(/^([a-z]+)-([a-z]+)-([a-z]+)*(\d*)/)){
  const bookWithoutNumber = slug.replace(/(\d+|\.)/g, '');
  return `${bookWithoutNumber}/${slug}`;
}

  const slugParts = slug.match(/^([a-z]+)(\d*)\.*(\d*)/);
  const book = slugParts[1];
  const firstNum = slugParts[2];

  if (book === "dn" || book === "mn") {
    return `${book}/${slug}`;
  } else if (book === "sn" || book === "an") {
    return `${book}/${book}${firstNum}/${slug}`;
  } else if (book === "kp") {
    return `kn/kp/${slug}`;
  } else if (book === "dhp") {
    return `kn/dhp/${slug}`;
  } else if (book === "ud") {
    return `kn/ud/vagga${firstNum}/${slug}`;
  } else if (book === "iti") {
    return `kn/iti/vagga${findItiVagga(firstNum)}/${slug}`;
  } else if (book === "snp") {
    return `kn/snp/vagga${firstNum}/${slug}`;
  } else if (book === "thag" || book === "thig") {
    return `kn/${book}/${slug}`;
  } else if (book === "ja") {
    return `kn/${book}/${slug}`;
  }
}

function findItiVagga(suttaNumber) {
  if (suttaNumber >= 1 && suttaNumber <= 10) {
    return "1";
  } else if (suttaNumber >= 11 && suttaNumber <= 20) {
    return "2";
  } else if (suttaNumber >= 21 && suttaNumber <= 27) {
    return "3";
  } else if (suttaNumber >= 28 && suttaNumber <= 37) {
    return "4";
  } else if (suttaNumber >= 38 && suttaNumber <= 49) {
    return "5";
  } else if (suttaNumber >= 50 && suttaNumber <= 59) {
    return "6";
  } else if (suttaNumber >= 60 && suttaNumber <= 69) {
    return "7";
  } else if (suttaNumber >= 70 && suttaNumber <= 79) {
    return "8";
  } else if (suttaNumber >= 80 && suttaNumber <= 89) {
    return "9";
  } else if (suttaNumber >= 90 && suttaNumber <= 99) {
    return "10";
  } else if (suttaNumber >= 100 && suttaNumber <= 112) {
    return "11";
  }
}


// clicking an abbreviation on the home page will replace the input field with that abbreviation
const abbreviations = document.querySelectorAll("span.abbr");
abbreviations.forEach(book => {
  book.addEventListener("click", e => {
    citation.value = e.target.innerHTML;
    // form.input.setSelectionRange(10, 10);
    citation.focus();
  });
});

