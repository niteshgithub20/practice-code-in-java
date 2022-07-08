public class Test3
{
   public static void main(String[] args)
     {
        int[][] a={{1,2,3},{4,5,6}};
        for(int i=0;i<a[0].length;i++)
        {
          int sum1=0;
          for(int j=0;j<a.length;j++)
             {
           sum1=sum1+a[j][i];
              }
          System.out.println(sum1);
           }
       }
}