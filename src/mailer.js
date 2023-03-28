const nodemailer = require("nodemailer");

export const transporter = nodemailer.createTransport({
  host: "smtp.gmail.com",
  port: 465,
  secure: true, // true for 465, false for other ports
  auth: {
    user: "20181136@uthh.edu.mx", // generated ethereal user
    pass: "kvdyhlbxwqdcgqce", // generated ethereal password
  },
});

transporter.verify().then(() => {
  console.log("listo para enviar emails");
});
