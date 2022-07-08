import java.util.Scanner;
public class Solution2
{
public static void main(String[] args) {
            Scanner sc=new Scanner(System.in);
            System.out.println("================================");
            for(int i=0;i<3;i++){
                String s1=sc.next();
                int x=sc.nextInt();
                int j=0;
                if(s1.length()<=10&&j<1000)
                {
                    String StringFormatted = String.format("%-15s",s1);
                    System.out.print(StringFormatted);
                    if(x<100)
                    {
                        String padded = String.format("%03d",x);
                        System.out.print(padded);
                    }
                    else
                    {
                        System.out.print(x);
                    }
                    //System.out.print(x);
                }
                System.out.println("");
            }
            System.out.println("================================");

    }
}
