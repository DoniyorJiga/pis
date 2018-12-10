using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Threading;
using System.Data.SqlClient;
namespace рулетка______________
{
    public partial class Form2 : Form
    {
        public Form2()
        {
            InitializeComponent();
        }
        string pic = "1.jpg";
       public static int balans = 0;
        int stavka=0;
        Gamee g;
        Player p;
        bool result;
		///	int result = 0;
		public static int id = 0;
        private void Form2_Load(object sender, EventArgs e)
        {   balans = 2000;
           
			Form1 f = new Form1();

			//MessageBox.Show(f.user); 
			id = Convert.ToInt32(f.user);
			Schet();
			//label4.Text = result.ToString();
			Schet();
			p = new Player(balans);
			Balans(p.info());
        }
        public void Balans(int a)
        {
			SchetUpdate();
            LaBalanse.Text = a.ToString();
        }
		static string connectionString = @"Data Source=DONIYOR;Initial Catalog=roulette;Integrated Security=True";
		private static void Schet()
		{
			string sqlExpression = "SchetReturn";

			using (SqlConnection connection = new SqlConnection(connectionString))
			{
				connection.Open();
				SqlCommand command = new SqlCommand(sqlExpression, connection);
				command.CommandType = CommandType.StoredProcedure;

				SqlParameter nameParam = new SqlParameter
				{
					ParameterName = "@ID",
					Value = id
				};
				command.Parameters.Add(nameParam);
				balans = Convert.ToInt32(command.ExecuteScalar().ToString());

			}
		}

		private static void SchetUpdate()
		{
			string sqlExpression = "SchetUpdate";

			using (SqlConnection connection = new SqlConnection(connectionString))
			{
				connection.Open();
				SqlCommand command = new SqlCommand(sqlExpression, connection);
				command.CommandType = CommandType.StoredProcedure;

				SqlParameter nameParam = new SqlParameter
				{
					ParameterName = "@ID",
					Value = id
				};
				command.Parameters.Add(nameParam);
				SqlParameter schetParam = new SqlParameter
				{
					ParameterName = "@Schet",
					Value = balans
				};
				command.Parameters.Add(schetParam);
				command.ExecuteScalar();

			}
		}

		private void button1_Click(object sender, EventArgs e)
        {
         
            p = new Player(balans);
            start();

        }
      public void start()
        {
           
            textBox1.Text = "";
        }
       
        public void res()
        {
            if (result)
            {
                 button2.Enabled = true;
                 button2.BackColor = Color.LightGreen;
            }
            else
            {
                button2.Enabled = false;
                button2.BackColor = Color.Red;
            }
        }
        private void pictureBox1_MouseEnter(object sender, EventArgs e)
        {
        
        }

        private void toolStripMenuItem14_Click(object sender, EventArgs e)
        {

            g = new Gamee("Нет","Нет","1-18");
            result = true;
            res();
        }

        private void поставитьToolStripMenuItem_Click(object sender, EventArgs e)
        {
            g = new Gamee(Convert.ToInt32(toolStripTextBox1.Text));
            result = true;
            res();
        }
		//резултат
        int t = 0;
        private void button2_Click(object sender, EventArgs e)
        {
            if (textBox1.Text!= ""){
               //oyin bowlanadi
                timer1.Start();
                while(t<20)
                {
                    Application.DoEvents();
                }
                timer1.Stop();
                t = 0;
                stavka =Convert.ToInt32(textBox1.Text);
				//stavtekshiramiz
                if (stavka <= p.info())
                {
                     p.minus(Convert.ToInt32(textBox1.Text));
                   int k= g.srav();
                    if (k == 0) MessageBox.Show("Вы проиграли " + g.k.acheika(g.k).ToString() + " " + g.k.acheika2(g.k).ToString());
                    else
                    {
                        MessageBox.Show("Вы выиграли " + g.k.acheika(g.k).ToString() + " " + g.k.acheika2(g.k).ToString());
                       p.plus(stavka * k);
                    }
                    Balans(p.info());
                    result = false;
                    res();
                }
                else
                {
                    MessageBox.Show("Недостаточно средств!");
                }
            }
            else
            {
                MessageBox.Show("Введите сумму ставки");
            }
        }

        private void поставитьToolStripMenuItem2_Click(object sender, EventArgs e)
        {
            string[] j = toolStripTextBox3.Text.Split(',');
            g = new Gamee(Convert.ToInt32(j[0]), Convert.ToInt32(j[1]), Convert.ToInt32(j[2]));
            result = true;
            res();
        }

        private void поставитьToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            string[] j = toolStripTextBox2.Text.Split(',');
            g = new Gamee(Convert.ToInt32(j[0]), Convert.ToInt32(j[1]), Convert.ToInt32(j[2]), Convert.ToInt32(j[3]));
            result = true;
            res();
        }

        private void четноеToolStripMenuItem_Click(object sender, EventArgs e)
        {
            g = new Gamee("Нет","Четное", "Нет");
            result = true;
            res();
        }

        private void нечетноеToolStripMenuItem_Click(object sender, EventArgs e)
        {
            g = new Gamee("Нет", "Нечетное", "Нет");
            result = true;
            res();
        }

        private void черныйToolStripMenuItem_Click(object sender, EventArgs e)
        {
            g = new Gamee( "Черный", "Нет","Нет");
            result = true;
            res();
        }

        private void красныйToolStripMenuItem_Click(object sender, EventArgs e)
        {
            g = new Gamee("Красный", "Нет", "Нет");
            result = true;
            res();
        }

        private void toolStripMenuItem15_Click(object sender, EventArgs e)
        {
            g = new Gamee("Нет", "Нет", "19-36");
            result = true;
            res();
        }

        private void дваЧислаToolStripMenuItem_Click(object sender, EventArgs e)
        {

        }

        private void поставитьToolStripMenuItem3_Click(object sender, EventArgs e)
        {

            string[] j = toolStripTextBox4.Text.Split(',');
            g = new Gamee(Convert.ToInt32(j[0]), Convert.ToInt32(j[1]));
            result = true;
            res();
        }

        private void st12ToolStripMenuItem_Click(object sender, EventArgs e)
        {
            g = new Gamee("1st12");
            result = true;
            res();
        }

        private void nd12ToolStripMenuItem_Click(object sender, EventArgs e)
        {
            g = new Gamee("2st12");
            result = true;
            res();
        }

        private void rd12ToolStripMenuItem_Click(object sender, EventArgs e)
        {
            g = new Gamee("3st12");
            result = true;
            res();

        }

        private void to11ToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            g = new Gamee("2to11");
            result = true;
            res();
        }

        private void to11ToolStripMenuItem_Click(object sender, EventArgs e)
        {
            g = new Gamee("2to12");
            result = true;
            res();
        }

        private void to13ToolStripMenuItem_Click(object sender, EventArgs e)
        {
            g = new Gamee("2to13");
            result = true;
            res();
        }

        private void сделатьСтавкуToolStripMenuItem_Click(object sender, EventArgs e)
        {

        }

        private void pictureBox2_Click(object sender, EventArgs e)
        {

        }
        int p1 = 0;
        private void timer1_Tick(object sender, EventArgs e)
        {

            pic = (p1 + 1).ToString() + ".jpg";
            if (p1 < 3) p1++;
            else p1 = 0;
            Image image = Image.FromFile(pic);
            int width = pictureBox2.Width; int height = pictureBox2.Height;
            pictureBox2.Width = width;
            pictureBox2.Height = height;
            pictureBox2.Image = image;
            t++;
        }

        private void Form2_Paint(object sender, PaintEventArgs e)
        {
            //pic = "1.jpg";
            Image image = Image.FromFile(pic);
            int width = pictureBox2.Width; int height = pictureBox2.Height;
            pictureBox2.Width = width;
            pictureBox2.Height = height;
            pictureBox2.Image = image;
        }

		private void pictureBox1_Click(object sender, EventArgs e)
		{

		}
	}
}
