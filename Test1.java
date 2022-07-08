import java.util.Scanner;
public class Test1 
{
     public static void main(String args[]) 
        {
               Scanner sc = new Scanner(System.in);
               int[][] arr = new int[2][3];
               int sum1 = 0;
                for(int i = 0; i < arr.length; i++)
              { 
                 for(int j = 0; j < arr[i].length; j++)
                 {
                arr[i][j] = sc.nextInt();
                sum=sum1+arr[i][j];

                 }
              }

             System.out.println(sum);
          }
}
