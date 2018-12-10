using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Threading.Tasks;
using System.Data;
using System.Data.SqlClient;

namespace рулетка______________
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            button1.BackColor = this.BackColor;

        }

        private void button1_MouseHover(object sender, EventArgs e)
        {
            button1.BackColor = Color.LightGreen;
        }

        private void button1_MouseLeave(object sender, EventArgs e)
        {
            button1.BackColor = this.BackColor;
        }
		

			public string user
			{
				get
				{
					return result;
				}
			}
			public static string result;

			static string connectionString = @"Data Source=DONIYOR;Initial Catalog=roulette;Integrated Security=True";

			private static void AddUser(string name, string password)
			{
				// название процедуры 
				string sqlExpression = "AddUser";

				using (SqlConnection connection = new SqlConnection(connectionString))
				{
					connection.Open();
					SqlCommand command = new SqlCommand(sqlExpression, connection);
					// указываем, что команда представляет хранимую процедуру
					command.CommandType = System.Data.CommandType.StoredProcedure;
					// параметр для ввода имени 
					SqlParameter nameParam = new SqlParameter
					{
						ParameterName = "@user",
						Value = name
					};
					// добавляем параметр 
					command.Parameters.Add(nameParam);
					// параметр для ввода 
					SqlParameter pasParam = new SqlParameter
					{
						ParameterName = "@Password",
						Value = password
					};
					command.Parameters.Add(pasParam);

					SqlParameter schetParam = new SqlParameter
			{
						ParameterName = "@Schet",
						Value = 1000
					};
					command.Parameters.Add(schetParam);


					result = command.ExecuteScalar().ToString();




				}
			}



			private static void Prowuser(string name, string password)
			{
				string sqlExpression = "Prowuser";

				using (SqlConnection connection = new SqlConnection(connectionString))
				{
					connection.Open();
					SqlCommand command = new SqlCommand(sqlExpression, connection);
					command.CommandType = CommandType.StoredProcedure;

					SqlParameter nameParam = new SqlParameter
					{
						ParameterName = "@user",
						Value = name
					};
					command.Parameters.Add(nameParam);

					SqlParameter pasParam = new SqlParameter
					{
						ParameterName = "@password",
						Value = password
					};
					command.Parameters.Add(pasParam);

					// определяем первый выходной параметр 
					SqlParameter id = new SqlParameter
					{
						ParameterName = "@id",
						SqlDbType = SqlDbType.Int // тип параметра 
					};
					// указываем, что параметр будет выходным 
					id.Direction = ParameterDirection.Output;
					command.Parameters.Add(id);

					// определяем второй выходной параметр 
					SqlParameter schet = new SqlParameter
					{
						ParameterName = "@schet",
						SqlDbType = SqlDbType.Float
					};
					schet.Direction = ParameterDirection.Output;
					command.Parameters.Add(schet);


					result = command.ExecuteScalar().ToString();

				}
			}
			private void button1_Click(object sender, EventArgs e)
        {
			if (textBox1.Text != "" && textBox2.Text != "")
			{
				Prowuser(textBox1.Text, textBox2.Text);
				Form2 fr = new Form2();
				fr.Show();
				fr.Width = System.Windows.Forms.Screen.PrimaryScreen.Bounds.Width;
				fr.Height = System.Windows.Forms.Screen.PrimaryScreen.Bounds.Height;
				
			}
			else
			{
				MessageBox.Show("Заполните поля!");
			}
			
            
                
        }

		private void textBox2_TextChanged(object sender, EventArgs e)
		{

		}

		private void button2_Click(object sender, EventArgs e)
		{
			if (textBox1.Text != "" && textBox2.Text != "")
			{
				AddUser(textBox1.Text, textBox2.Text);
				Form2 fr = new Form2();
				fr.Show();
				fr.Width = System.Windows.Forms.Screen.PrimaryScreen.Bounds.Width;
				fr.Height = System.Windows.Forms.Screen.PrimaryScreen.Bounds.Height;
			}
			else
			{
				MessageBox.Show("Заполните поля!");
			}
		}
	}
}
