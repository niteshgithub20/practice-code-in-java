public class Test2
{
   public static void main(String[] args)
     {
        int[][] a={{1,2,3},{4,5,6}};
        for(int i=0;i<a.length;i++)
        {
          int sum1=0;
          for(int j=0;j<a[i].length;j++)
             {
           sum1=sum1+a[i][j];
              }
          System.out.println(sum1);
           }
       }
}