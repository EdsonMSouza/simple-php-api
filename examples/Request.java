import com.google.gson.Gson;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;

public class Request {

    public static void main(String[] args) throws IOException {
        SimpleApi data = new SimpleApi();
        data.fetchTimeline();
    }
}

class SimpleApi {

    private final String fetchUrl = "http://emsapi.esy.es/rest/api/search/";

    public void fetchTimeline() throws IOException {
        HttpURLConnection urlConnection = (HttpURLConnection) new URL(fetchUrl).openConnection();

        urlConnection.setRequestMethod("POST");
        urlConnection.setRequestProperty("Content-Type", "application/json; utf-8");
        urlConnection.setRequestProperty("Accept", "application/json");
        urlConnection.setConnectTimeout(5000);
        urlConnection.setReadTimeout(5000);
        urlConnection.setDoInput(true);
        urlConnection.setDoOutput(true);

        urlConnection.setRequestProperty("Authorization", "123");
        urlConnection.connect();

        Gson gson = new Gson();
        String jsonInputString = "{\"username\": \"john\", \"password\": \"doe\"}";

        try (OutputStream os = urlConnection.getOutputStream()) {
            byte[] input = jsonInputString.getBytes("utf-8");
            os.write(input, 0, input.length);
        } catch (IOException e) {
        }

        try (BufferedReader br = new BufferedReader(new InputStreamReader(urlConnection.getInputStream(), "utf-8"))) {

            String responseLine = null;
            String r = null;

            while ((responseLine = br.readLine()) != null) {
                r = responseLine;
                System.out.println(responseLine.trim());
            }

            User dd = gson.fromJson(r, User.class);
            System.out.println(dd.toString());
        }
    }
}

/*
 * Model class for a User
 */
class User {

    public int id;
    public String name;
    public String email;
    public String username;
    public String password;
    public String message;

    @Override
    public String toString() {
        return "id=" + id + "\nname=" + name + "\nemail=" + email + "\nmessage=" + message + '}';
    }
}