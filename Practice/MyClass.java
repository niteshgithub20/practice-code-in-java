import java.util.Scanner;



public class MyClass {

    public static void main(String[] args) {

            Scanner sc=new Scanner(System.in);

            Flowers[] flowers=new Flowers[4];



        for (int i = 0; i <4 ; i++) {

          int a=sc.nextInt();sc.nextLine();

          String b=sc.nextLine();

          int c=sc.nextInt();sc.nextLine();

          int d=sc.nextInt();sc.nextLine();

          String e=sc.nextLine();

           flowers[i]  = new Flowers(a,b,c,d,e);

        }



        String input=sc.nextLine();

       int ans= findMinPriceByType(flowers,input);

       if(ans==0)

       {

           System.out.println("There is no flower with given type");

       }

       else

       {

           System.out.println(ans);

       }

    }



   public static int findMinPriceByType(Flowers[] flowers,String input)

    {

         int idd=Integer.MAX_VALUE;

         int min=Integer.MAX_VALUE;



        for (int i = 0; i <flowers.length ; i++) {

            if(flowers[i].getType().equalsIgnoreCase(input) && flowers[i].getRating()>3 && flowers[i].getPrice()<min)

            {

                min=flowers[i].getPrice();

                idd=flowers[i].getFlowerId();

            }



        }





         if(min!=Integer.MAX_VALUE)

         {

             return idd;

         }

         return 0;



    }



}





class RRT

{

   private int ticketNo;

  private  String raisedBy;

   private String project;

   private int priority;

   private String assignedTo;



   //parametrized constructor





    public Flowers(int ticketNo, String raisedBy, String assignedTo, int priority, String project) {

        this.ticketNo = ticketNo;

        this.raisedBy = raisedBy;

        this.assignedTo = assignedTo;

        this.priority = priority;

        this.project = project;

    }



//getter and Setters





    public int ticketNo() {

        return ticketNo;

    }



    public void setTicketNo(int ticketNo) {

        this.ticketNo = ticketNo;

    }



    public String getFlowerName() {

        return flowerName;

    }



    public void setFlowerName(String flowerName) {

        this.flowerName = flowerName;

    }



    public int getPrice() {

        return price;

    }



    public void setPrice(int price) {

        this.price = price;

    }



    public int getRating() {

        return rating;

    }



    public void setRating(int rating) {

        this.rating = rating;

    }



    public String getType() {

        return type;

    }



    public void setType(String type) {

        this.type = type;

    }

}